<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use App\Models\Dosen;
use App\Models\Tim_penelitian;
use Illuminate\Http\Request;

class TimPenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timPenelitian = Tim_penelitian::with(['penelitian', 'dosen'])->get();
        return view('tim_penelitian.index', compact('timPenelitian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penelitian = Penelitian::all();
        $dosen = Dosen::all();
        return view('tim_penelitian.create', compact('penelitian', 'dosen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'penelitian_id' => 'required|exists:penelitian,id',
            'dosen_id' => 'required|exists:dosen,id',
            'peran' => 'required|string|max:50'
        ]);

        Tim_penelitian::create($request->all());

        return redirect()->route('tim_penelitian.index')
            ->with('success', 'Anggota tim penelitian berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tim_penelitian $timPenelitian)
    {
        return view('tim_penelitian.show', compact('timPenelitian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tim_penelitian $timPenelitian)
    {
        $penelitian = Penelitian::all();
        $dosen = Dosen::all();
        return view('tim_penelitian.edit', compact('timPenelitian', 'penelitian', 'dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tim_penelitian $timPenelitian)
    {
        $request->validate([
            'penelitian_id' => 'required|exists:penelitian,id',
            'dosen_id' => 'required|exists:dosen,id',
            'peran' => 'required|string|max:50'
        ]);

        $timPenelitian->update($request->all());

        return redirect()->route('tim_penelitian.index')
            ->with('success', 'Anggota tim penelitian berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tim_penelitian $timPenelitian)
    {
        $timPenelitian->delete();

        return redirect()->route('tim_penelitian.index')
            ->with('success', 'Anggota tim penelitian berhasil dihapus');
    }
}