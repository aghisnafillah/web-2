<?php

namespace App\Livewire\Pegawai;

use App\Models\Pegawai;
use App\Models\UnitKerja;
use Livewire\Component;

class CreatePegawai extends Component
{
    public $nip = '';
    public $nama = '';
    public $unit_kerja_id = '';

    public function save()
    {
        $this->validate([
            'nip' => 'required|string|max:10',
            'nama' => 'required|string|max:50',
            'unit_kerja_id' => 'required|exists:unit_kerja,id',
        ]);

        Pegawai::create([
            'nip' => $this->nip,
            'nama' => $this->nama,
            'unit_kerja_id' => $this->unit_kerja_id,
        ]);

        session()->flash('message', 'Pegawai berhasil ditambahkan.');
        return redirect()->route('pegawai.index');
    }

    public function render()
    {
        return view('livewire.pegawai.create-pegawai', [
            'unitKerjas' => UnitKerja::all(),
        ]);
    }
}
