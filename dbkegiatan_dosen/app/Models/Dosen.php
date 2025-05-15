<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = "dosen";

    protected $fillable = [
        'nidn',
        'name',
        'gelar_belakang',
        'gelar_depan',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'email',
        'tahun_masuk',
        'prodi_id'
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function dosen_kegiatan()
    {
        return $this->hashMany(Dosen_kegiatan::class);
    }

    public function tim_penelitian()
    {
        return $this->belongsTo(Tim_penelitian::class);
    }

    public function kegiatan()
    {
        return $this->belongsToMany(Kegiatan::class, 'dosen_kegiatan', 'dosen_id', 'kegiatan_id')
            ->withTimestamps();
    }

}
