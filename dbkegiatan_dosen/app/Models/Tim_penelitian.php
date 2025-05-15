<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tim_penelitian extends Model
{
    use HasFactory;

    protected $table = "tim_penelitian";

    protected $fillable = [
        'dosen_id',
        'penelitian_id',
        'peran'
    ];

    public function penelitian()
    {
        return $this->belongsTo(Penelitian::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
