<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kegiatan;
use App\Models\Penelitian;
use App\Models\Prodi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $prodi = Prodi::all();
        $dosen = Dosen::all();
        $kegiatan = Kegiatan::all();
        $penelitian = Penelitian::all();
        return view('dashboard', compact('dosen', 'prodi', 'penelitian', 'kegiatan'));
    }
}
