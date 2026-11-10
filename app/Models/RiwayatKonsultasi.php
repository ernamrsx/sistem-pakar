<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RiwayatKonsultasi extends Model
{
    protected $fillable = [
        'kode_sesi',
        'nama_pengguna',
        'hasil_rekomendasi',
        'status',
    ];

    protected $casts = [
        'hasil_rekomendasi' => 'array',
    ];

    public function jawabans(): HasMany
    {
        return $this->hasMany(Jawaban::class);
    }
}
