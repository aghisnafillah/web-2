<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = "prodi";

    protected $fillable = [
        'kode', 'name', 'alamat', 'telpon', 'ketua'
    ];

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'prodi_id');
    }
}
