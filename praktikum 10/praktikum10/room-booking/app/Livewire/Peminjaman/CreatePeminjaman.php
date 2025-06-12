<?php

namespace App\Livewire\Peminjaman;

use App\Models\Peminjaman;
use App\Models\Ruang;
use App\Models\Pegawai;
use Livewire\Component;

class CreatePeminjaman extends Component
{
    public $pegawai_id= '';
    public $ruang_id = '';
    public $tanggal='';  
    public $jam_mulai = '';
    public $jam_akhir = '';  
    public $keterangan= ''; 
    
    public function save()
    {
        $this->validate([
            'pegawai_id' => 'required|exists:pegawai,id',
            'ruang_id' => 'required|exists:ruang,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_akhir' => 'required',
            'keterangan' => 'required|string|max:255',
        ]);
        
        Peminjaman::create([
            'pegawai_id' => $this->pegawai_id,
            'ruang_id' => $this->ruang_id,
            'tanggal' => $this->tanggal,
            'jam_mulai' => $this->jam_mulai,
            'jam_akhir' => $this->jam_akhir,
            'keterangan' => $this->keterangan,
        ]);

        session()->flash('message', 'Peminjaman berhasil ditambahkan!');
        $this->redirectRoute('peminjaman.index');
    }

    public function render()
    {
        return view('livewire.peminjaman.create-peminjaman',['pegawais' => Pegawai::all(), 'ruangs' => Ruang::all(),]);
    }
}
