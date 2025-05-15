<?php

use App\Http\Controllers\BidangIlmuController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\DosenKegiatanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisKegiatanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\TimPenelitianController;
use Illuminate\Support\Facades\Route;

route::get('/', [HomeController::class, 'index'])->name('dashboard');

Route::resource('prodi', ProdiController::class);
Route::resource('dosen', DosenController::class);
Route::resource('bidang_ilmu', BidangIlmuController::class);
Route::resource('kegiatan', KegiatanController::class);
Route::resource('jenis_kegiatan', JenisKegiatanController::class);
Route::resource('penelitian', PenelitianController::class);
Route::resource('tim_penelitian', TimPenelitianController::class);
Route::resource('dosen_kegiatan', DosenKegiatanController::class, [
    'parameters' => [
        'dosen_kegiatan' => 'dosen_id:kegiatan_id'
    ]
]);
Route::get('/dosen_kegiatan/{dosen_id}/{kegiatan_id}', [DosenKegiatanController::class, 'show'])->name('dosen_kegiatan.show');
Route::get('/dosen_kegiatan/{dosen_id}/{kegiatan_id}/edit', [DosenKegiatanController::class, 'edit'])->name('dosen_kegiatan.edit');
Route::put('/dosen_kegiatan/{dosen_id}/{kegiatan_id}', [DosenKegiatanController::class, 'update'])->name('dosen_kegiatan.update');
Route::delete('/dosen_kegiatan/{dosen_id}/{kegiatan_id}', [DosenKegiatanController::class, 'destroy'])->name('dosen_kegiatan.destroy');
