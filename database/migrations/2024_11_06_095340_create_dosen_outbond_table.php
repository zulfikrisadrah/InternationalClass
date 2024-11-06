<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dosen_outbond', function (Blueprint $table) {
            $table->integer('ID_Dosen_Outbond')->primary();
            $table->string('Nama_Dosen_Mitra', 100)->nullable();
            $table->string('Jenis_Kelamin', 10)->nullable();
            $table->string('Peran', 50)->nullable();
            $table->string('Asal_Universitas', 100)->nullable();
            $table->year('Tahun_Kegiatan')->nullable();
            $table->integer('ID_Kegiatan')->nullable()->index('id_kegiatan');
            $table->integer('ID_Prodi')->nullable()->index('id_prodi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_outbond');
    }
};
