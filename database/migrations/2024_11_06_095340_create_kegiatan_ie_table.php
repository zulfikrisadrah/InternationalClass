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
        Schema::create('kegiatan_ie', function (Blueprint $table) {
            $table->integer('ID_Kegiatan', true);
            $table->string('Nama_Kegiatan');
            $table->string('Negara_Pelaksanaan', 50);
            $table->date('Tanggal_Pelaksanaan');
            $table->integer('Jumlah_Peserta');
            $table->integer('ID_Prodi')->nullable()->index('id_prodi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_ie');
    }
};
