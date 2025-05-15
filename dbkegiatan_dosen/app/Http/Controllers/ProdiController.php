<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::all();
        return view('prodi.index', compact('prodi'));
    }

    public function create()
    {
        return view('prodi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:10|unique:prodi',
            'name' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:100',
            'telpon' => 'nullable|string|max:20',
            'ketua' => 'nullable|string|max:45',
        ]);

        Prodi::create($validated);

        return redirect()->route('prodi.index')
            ->with('success', 'Program studi berhasil ditambahkan');
    }

    public function show(Prodi $prodi)
    {
        $prodi->load('dosen');
        return view('prodi.show', compact('prodi'));
    }

    public function edit(Prodi $prodi)
    {
        return view('prodi.edit', compact('prodi'));
    }

    public function update(Request $request, Prodi $prodi)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:10|unique:prodi,kode,' . $prodi->id,
            'name' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:100',
            'telpon' => 'nullable|string|max:20',
            'ketua' => 'nullable|string|max:45',
        ]);

        $prodi->update($validated);

        return redirect()->route('prodi.index')
            ->with('success', 'Program studi berhasil diperbarui');
    }

    public function destroy(Prodi $prodi)
    {
        // Cek apakah prodi memiliki dosen
        if ($prodi->dosen()->count() > 0) {
            return redirect()->back()
                ->with('error', 'Tidak dapat menghapus prodi karena masih memiliki dosen');
        }

        $prodi->delete();

        return redirect()->route('prodi.index')
            ->with('success', 'Program studi berhasil dihapus');
    }
}