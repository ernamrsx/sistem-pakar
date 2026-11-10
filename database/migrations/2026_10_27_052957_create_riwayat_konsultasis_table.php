
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_konsultasis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sesi', 36)->unique();
            $table->string('nama_pengguna')->nullable();
            $table->json('hasil_rekomendasi')->nullable();
            $table->string('status', 20)->default('proses');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_konsultasis');
    }
};
