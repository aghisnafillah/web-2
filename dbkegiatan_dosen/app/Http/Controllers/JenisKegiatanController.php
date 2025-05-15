<?php

namespace App\Http\Controllers;

use App\Models\Jenis_kegiatan;
use Illuminate\Http\Request;

class JenisKegiatanController extends Controller
{
    public function index()
    {
        $jenisKegiatan = Jenis_kegiatan::withCount('kegiatan')->get();
            
        return view('jenis_kegiatan.index', compact('jenisKegiatan'));
    }

    public function create()
    {
        return view('jenis_kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:45|unique:jenis_kegiatan',
        ]);

        Jenis_kegiatan::create($request->all());

        return redirect()->route('jenis_kegiatan.index')
                         ->with('success', 'Jenis kegiatan berhasil ditambahkan');
    }

    public function show(Jenis_kegiatan $jenisKegiatan)
    {
        $jenisKegiatan->load(['kegiatan' => function($query) {
            $query->withCount('dosen')->latest();
        }]);
        
        return view('jenis_kegiatan.show', compact('jenisKegiatan'));
    }

    public function edit(Jenis_kegiatan $jenisKegiatan)
    {
        return view('jenis_kegiatan.edit', compact('jenisKegiatan'));
    }

    public function update(Request $request, Jenis_kegiatan $jenisKegiatan)
    {
        $request->validate([
            'name' => 'required|string|max:45|unique:jenis_kegiatan,name,'.$jenisKegiatan->id,
        ]);

        $jenisKegiatan->update($request->all());

        return redirect()->route('jenis_kegiatan.index')
                         ->with('success', 'Jenis kegiatan berhasil diperbarui');
    }

    public function destroy(Jenis_kegiatan $jenisKegiatan)
    {
        $jenisKegiatan->delete();

        return redirect()->route('jenis_kegiatan.index')
                         ->with('success', 'Jenis kegiatan berhasil dihapus');
    }
}