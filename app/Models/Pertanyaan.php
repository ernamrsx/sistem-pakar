<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pertanyaan extends Model
{
    protected $fillable = [
        'kode',
        'teks',
        'kategori',
        'urutan',
        'aktif',
    ];

    protected $casts = [
        'urutan' => 'integer',
        'aktif' => 'boolean',
    ];

    public function jawabans(): HasMany
    {
        return $this->hasMany(Jawaban::class);
    }
}
