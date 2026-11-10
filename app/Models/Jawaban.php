<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jawaban extends Model
{
    protected $fillable = [
        'riwayat_konsultasi_id',
        'pertanyaan_id',
        'jawaban',
    ];

    protected $casts = [
        'jawaban' => 'boolean',
    ];

    public function riwayatKonsultasi(): BelongsTo
    {
        return $this->belongsTo(RiwayatKonsultasi::class);
    }

    public function pertanyaan(): BelongsTo
    {
        return $this->belongsTo(Pertanyaan::class);
    }
}
