<?php

namespace App\Http\Controllers;

use App\Models\Bidang_ilmu;
use App\Models\Penelitian;
use Illuminate\Http\Request;

class PenelitianController extends Controller
{
    public function index()
    {
        $penelitian = Penelitian::with('bidang_ilmu')
            ->orderBy('tahun_ajaran', 'desc')
            ->orderBy('mulai', 'desc')
            ->get();
            
        return view('penelitian.index', compact('penelitian'));
    }

    public function create()
    {
        $bidangIlmu = Bidang_ilmu::orderBy('name')->get();
        return view('penelitian.create', compact('bidangIlmu'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'mulai' => 'required|date',
            'akhir' => 'required|date|after_or_equal:mulai',
            'tahun_ajaran' => 'required|string|max:5',
            'bidang_ilmu_id' => 'required|exists:bidang_ilmu,id'
        ]);

        try {
            Penelitian::create($validated);

            return redirect()->route('penelitian.index')
                ->with('success', 'Data penelitian berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }

    public function show(Penelitian $penelitian)
    {
        $penelitian->load('bidang_ilmu');
        return view('penelitian.show', compact('penelitian'));
    }

    public function edit(Penelitian $penelitian)
    {
        $bidangIlmu = Bidang_ilmu::orderBy('name')->get();
        return view('penelitian.edit', compact('penelitian', 'bidangIlmu'));
    }

    public function update(Request $request, Penelitian $penelitian)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'mulai' => 'required|date',
            'akhir' => 'required|date|after_or_equal:mulai',
            'tahun_ajaran' => 'required|string|max:5',
            'bidang_ilmu_id' => 'required|exists:bidang_ilmu,id'
        ]);

        try {
            $penelitian->update($validated);

            return redirect()->route('penelitian.index')
                ->with('success', 'Data penelitian berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy(Penelitian $penelitian)
    {
        try {
            $penelitian->delete();

            return redirect()->route('penelitian.index')
                ->with('success', 'Data penelitian berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}