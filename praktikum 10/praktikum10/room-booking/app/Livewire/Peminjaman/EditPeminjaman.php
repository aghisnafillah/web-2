<?php

namespace App\Livewire\Peminjaman;

use App\Models\Peminjaman;
use App\Models\Ruang;
use App\Models\Pegawai;
use Livewire\Component;

class EditPeminjaman extends Component
{
    public Peminjaman $peminjaman;
    public $pegawai_id = '';
    public $ruang_id = '';
    public $tanggal = '';
    public $jam_mulai = '';
    public $jam_akhir = '';
    public $keterangan = '';

    public function mount(Peminjaman $peminjaman)
    {
        $this->peminjaman = $peminjaman;
        $this->pegawai_id = $peminjaman->pegawai_id;
        $this->ruang_id = $peminjaman->ruang_id;
        $this->tanggal = $peminjaman->tanggal;
        $this->jam_mulai = $peminjaman->jam_mulai;
        $this->jam_akhir = $peminjaman->jam_akhir;
        $this->keterangan = $peminjaman->keterangan;
    }

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

        $this->peminjaman->update([
            'pegawai_id' => $this->pegawai_id,
            'ruang_id' => $this->ruang_id,
            'tanggal' => $this->tanggal,
            'jam_mulai' => $this->jam_mulai,
            'jam_akhir' => $this->jam_akhir,
            'keterangan' => $this->keterangan,
        ]);

        session()->flash('message', 'Data peminjaman berhasil diperbarui.');
        return $this->redirectRoute('peminjaman.index');
    }

    public function render()
    {
        return view('livewire.peminjaman.edit-peminjaman', [
            'pegawais' => Pegawai::all(),
            'ruangs' => Ruang::all(),
        ]);
    }
}
