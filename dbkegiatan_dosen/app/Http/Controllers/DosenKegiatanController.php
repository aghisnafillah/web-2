<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Dosen_kegiatan;
use App\Models\Kegiatan;
use App\Models\DosenKegiatan;
use Illuminate\Http\Request;

class DosenKegiatanController extends Controller
{
    public function index()
    {
        $dosenKegiatan = Dosen_kegiatan::with(['dosen', 'kegiatan.jenis_kegiatan'])->get();
            
        return view('dosen_kegiatan.index', compact('dosenKegiatan'));
    }

    public function create()
    {
        $dosen = Dosen::orderBy('name')->get();
        $kegiatan = Kegiatan::with('jenis_kegiatan')->orderBy('deskripsi')->get();
        
        return view('dosen_kegiatan.create', compact('dosen', 'kegiatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required|exists:dosen,id',
            'kegiatan_id' => 'required|exists:kegiatan,id|unique:dosen_kegiatan,kegiatan_id,NULL,id,dosen_id,'.$request->dosen_id,
        ]);

        Dosen_kegiatan::create([
            'dosen_id' => $request->dosen_id,
            'kegiatan_id' => $request->kegiatan_id,
        ]);

        return redirect()->route('dosen_kegiatan.index')
                         ->with('success', 'Relasi dosen - kegiatan berhasil ditambahkan');
    }

    public function show($dosen_id, $kegiatan_id)
    {
        $dosenKegiatan = Dosen_kegiatan::with(['dosen', 'kegiatan.jenis_kegiatan'])
            ->where('dosen_id', $dosen_id)
            ->where('kegiatan_id', $kegiatan_id)
            ->firstOrFail();
            
        return view('dosen_kegiatan.show', compact('dosenKegiatan'));
    }

    public function edit($dosen_id, $kegiatan_id)
    {
        $dosenKegiatan = Dosen_kegiatan::where('dosen_id', $dosen_id)
            ->where('kegiatan_id', $kegiatan_id)
            ->firstOrFail();
            
        $dosen = Dosen::orderBy('name')->get();
        $kegiatan = Kegiatan::with('jenis_kegiatan')->orderBy('deskripsi')->get();
        
        return view('dosen_kegiatan.edit', compact('dosenKegiatan', 'dosen', 'kegiatan'));
    }

    public function update(Request $request, $dosen_id, $kegiatan_id)
    {
        $request->validate([
            'dosen_id' => 'required|exists:dosen,id',
            'kegiatan_id' => 'required|exists:kegiatan,id|unique:dosen_kegiatan,kegiatan_id,'.$kegiatan_id.',kegiatan_id,dosen_id,'.$dosen_id,
        ]);

        Dosen_kegiatan::where('dosen_id', $dosen_id)
            ->where('kegiatan_id', $kegiatan_id)
            ->update([
                'kegiatan_id' => $request->kegiatan_id,
            ]);

        return redirect()->route('dosen_kegiatan.index')
                         ->with('success', 'Relasi dosen - kegiatan berhasil diperbarui');
    }

    public function destroy($dosen_id, $kegiatan_id)
    {
        Dosen_kegiatan::where('dosen_id', $dosen_id)
            ->where('kegiatan_id', $kegiatan_id)
            ->delete();

        return redirect()->route('dosen_kegiatan.index')
                         ->with('success', 'Relasi dosen - kegiatan berhasil dihapus');
    }
}