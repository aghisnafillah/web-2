<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = Dosen::with('prodi')->get();
        return view('dosen.index', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('dosen.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nidn' => 'required|string|max:20|unique:dosen',
            'name' => 'required|string|max:45',
            'gelar_depan' => 'nullable|string|max:20',
            'gelar_belakang' => 'nullable|string|max:30',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'nullable|string|max:45',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:45',
            'tahun_masuk' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'prodi_id' => 'required|exists:prodi,id',
        ]);

        Dosen::create($validated);

        return redirect()->route('dosen.index')
            ->with('success', 'Data dosen berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        $dosen->load(['prodi', 'kegiatan.jenis_kegiatan']);
        return view('dosen.show', compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        $prodi = Prodi::all();
        return view('dosen.edit', compact('dosen', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {

        $validated = $request->validate([
            'nidn' => 'required|string|max:20|unique:dosen,nidn,' . $dosen->id,
            'name' => 'required|string|max:45',
            'gelar_depan' => 'nullable|string|max:20',
            'gelar_belakang' => 'nullable|string|max:30',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'nullable|string|max:45',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:45',
            'tahun_masuk' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'prodi_id' => 'required|exists:prodi,id',
        ]);

        $dosen->update($validated);

        return redirect()->route('dosen.index')
            ->with('success', 'Data dosen berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->route('dosen.index')
            ->with('success', 'Data dosen berhasil dihapus');
    }
}