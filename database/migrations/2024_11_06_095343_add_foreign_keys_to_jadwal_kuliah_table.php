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
        Schema::table('jadwal_kuliah', function (Blueprint $table) {
            $table->foreign(['ID_Dosen'], 'jadwal_kuliah_ibfk_1')->references(['ID_Dosen'])->on('dosen')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['ID_MataKuliah'], 'jadwal_kuliah_ibfk_2')->references(['ID_MataKuliah'])->on('mata_kuliah')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal_kuliah', function (Blueprint $table) {
            $table->dropForeign('jadwal_kuliah_ibfk_1');
            $table->dropForeign('jadwal_kuliah_ibfk_2');
        });
    }
};
