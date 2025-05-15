<?php

namespace App\Http\Controllers;

use App\Models\Jenis_kegiatan;
use App\Models\Kegiatan;
use App\Models\JenisKegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::with(['jenis_kegiatan', 'dosen'])->get();

        return view('kegiatan.index', compact('kegiatan'));
    }

    public function create()
    {
        $jenisKegiatan = Jenis_kegiatan::orderBy('name')->get();
        return view('kegiatan.create', compact('jenisKegiatan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_kegiatan_id' => 'required|exists:jenis_kegiatan,id',
            'deskripsi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'tempat' => 'required|string|max:100',
        ]);

        Kegiatan::create($validated);

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function show(Kegiatan $kegiatan)
    {
        $kegiatan->load(['jenis_kegiatan', 'dosen.prodi']);
        return view('kegiatan.show', compact('kegiatan'));
    }

    public function edit(Kegiatan $kegiatan)
    {
        $jenisKegiatan = Jenis_kegiatan::orderBy('name')->get();
        return view('kegiatan.edit', compact('kegiatan', 'jenisKegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'jenis_kegiatan_id' => 'required|exists:jenis_kegiatan,id',
            'deskripsi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'tempat' => 'required|string|max:100',
        ]);

        $kegiatan->update($validated);

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan berhasil diperbarui');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        if ($kegiatan->dosen()->count() > 0) {
            return redirect()->back()
                ->with('error', 'Tidak dapat menghapus karena kegiatan ini masih memiliki peserta dosen');
        }

        $kegiatan->delete();

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan berhasil dihapus');
    }
}