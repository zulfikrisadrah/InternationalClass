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
        Schema::create('jadwal_kuliah', function (Blueprint $table) {
            $table->integer('ID_Jadwal', true);
            $table->string('Hari', 50);
            $table->time('Jam_Mulai');
            $table->time('Jam_Selesai');
            $table->integer('ID_Dosen')->nullable()->index('id_dosen');
            $table->integer('ID_MataKuliah')->nullable()->index('id_matakuliah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_kuliah');
    }
};
