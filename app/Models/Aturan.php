<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
    protected $fillable = [
        'kode',
        'nama',
        'kondisi',
        'kesimpulan',
        'deskripsi',
        'aktif',
    ];

    protected $casts = [
        'kondisi' => 'array',
        'aktif' => 'boolean',
    ];
}
