<?php

namespace App\Http\Controllers;

use App\Models\Bidang_ilmu;
use Illuminate\Http\Request;

class BidangIlmuController extends Controller
{
    public function index()
    {
        $bidang_ilmu = Bidang_ilmu::all();
        return view('bidang_ilmu.index', compact('bidang_ilmu'));
    }

    public function create()
    {
        return view('bidang_ilmu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:45|unique:bidang_ilmu',
            'deskripsi' => 'nullable|string',
        ]);

        Bidang_ilmu::create($request->all());

        return redirect()->route('bidang_ilmu.index')
            ->with('success', 'Bidang ilmu berhasil ditambahkan');
    }

    public function show(Bidang_ilmu $bidang_ilmu)
    {
        $bidang_ilmu->load('penelitians');
        return view('bidang_ilmu.show', compact('bidang_ilmu'));
    }

    public function edit(Bidang_ilmu $bidang_ilmu)
    {
        return view('bidang_ilmu.edit', compact('bidang_ilmu'));
    }

    public function update(Request $request, Bidang_ilmu $bidang_ilmu)
    {
        $request->validate([
            'name' => 'required|string|max:45|unique:bidang_ilmu,name,' . $bidang_ilmu->id,
            'deskripsi' => 'nullable|string',
        ]);

        $bidang_ilmu->update($request->all());

        return redirect()->route('bidang_ilmu.index')
            ->with('success', 'Bidang ilmu berhasil diperbarui');
    }

    public function destroy(Bidang_ilmu $bidang_ilmu)
    {
        if ($bidang_ilmu->penelitian()->count() > 0) {
            return redirect()->back()
                ->with('error', 'Tidak dapat menghapus karena bidang ilmu ini masih terkait dengan penelitian');
        }

        $bidang_ilmu->delete();

        return redirect()->route('bidang_ilmu.index')
            ->with('success', 'Bidang ilmu berhasil dihapus');
    }
}