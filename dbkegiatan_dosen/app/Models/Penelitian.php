<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    use HasFactory;

    protected $table = "penelitian";

    protected $fillable = [
        'judul',
        'mulai',
        'akhir',
        'tahun_ajaran',
        'bidang_ilmu_id'
    ];

    public function tim_penelitian()
    {
        return $this->belongsTo(Tim_penelitian::class);
    }

    public function bidang_ilmu()
    {
        return $this->belongsTo(Bidang_ilmu::class, 'bidang_ilmu_id');
    }

    public function penelitian()
    {
        return $this->hasMany(Penelitian::class);
    }
}
