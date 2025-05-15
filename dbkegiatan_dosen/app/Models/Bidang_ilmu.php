<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang_ilmu extends Model
{
    use HasFactory;

    protected $table = "bidang_ilmu";

    protected $fillable = [
        'name', 'deskripsi'
    ];

    public function penelitian()
    {
        return $this->belongsTo(Penelitian::class, 'bidang_ilmu_id');
    }
    
}
