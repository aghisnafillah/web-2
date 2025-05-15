<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = "kegiatan";

    protected $fillable = [
        'tanggal_mulai', 'tanggal_selesai', 'tempat', 'deskripsi', 'jenis_kegiatan_id'
    ];

    public function dosen_kegiatan()
    {
        return $this->belongsTo(Dosen_kegiatan::class);
    }

    public function jenis_kegiatan()
    {
          return $this->belongsTo(Jenis_kegiatan::class, 'jenis_kegiatan_id');
    }

    public function dosen()
    {
        return $this->belongsToMany(Dosen::class, 'dosen_kegiatan', 'kegiatan_id', 'dosen_id');
    }
}
