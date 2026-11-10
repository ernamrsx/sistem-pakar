
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jawabans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('riwayat_konsultasi_id')
                ->constrained('riwayat_konsultasis')
                ->cascadeOnDelete();

            $table->foreignId('pertanyaan_id')
                ->constrained('pertanyaans')
                ->cascadeOnDelete();

            $table->boolean('jawaban');
            $table->timestamps();

            $table->unique([
                'riwayat_konsultasi_id',
                'pertanyaan_id',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jawabans');
    }
};
