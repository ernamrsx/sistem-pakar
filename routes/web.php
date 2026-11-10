
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KonsultasiController;
use App\Models\Pertanyaan;

// HOME: tampilkan halaman welcome.blade.php
Route::get('/', function () {
    $questions = Pertanyaan::where('aktif', true)
        ->orderBy('urutan')
        ->get(['kode', 'teks', 'kategori', 'urutan']);

    return view('welcome', compact('questions'));
})->name('home');

// Halaman konsultasi terpisah
Route::get('/konsultasi', [KonsultasiController::class, 'index'])
    ->name('konsultasi.index');

// Proses jawaban dan Forward Chaining
Route::post('/konsultasi', [KonsultasiController::class, 'proses'])
    ->name('konsultasi.proses');
