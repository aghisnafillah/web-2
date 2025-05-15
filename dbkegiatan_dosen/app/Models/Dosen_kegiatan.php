<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen_kegiatan extends Model
{
    use HasFactory;

    protected $table = "dosen_kegiatan";
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'dosen_id',
        'kegiatan_id'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }
}
