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
        Schema::table('dosen_outbond', function (Blueprint $table) {
            $table->foreign(['ID_Kegiatan'], 'dosen_outbond_ibfk_1')->references(['ID_Kegiatan'])->on('kegiatan_ie')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['ID_Prodi'], 'dosen_outbond_ibfk_2')->references(['ID_Prodi'])->on('prodi')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dosen_outbond', function (Blueprint $table) {
            $table->dropForeign('dosen_outbond_ibfk_1');
            $table->dropForeign('dosen_outbond_ibfk_2');
        });
    }
};
