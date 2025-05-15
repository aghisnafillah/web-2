<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_kegiatan extends Model
{
    use HasFactory;

    protected $table = "jenis_kegiatan";

    protected $fillable = [
        'name'
    ];

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class,  'jenis_kegiatan_id');
    }
    
}
