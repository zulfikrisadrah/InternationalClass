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
        Schema::table('pengelola', function (Blueprint $table) {
            $table->foreign(['ID_Prodi'], 'pengelola_ibfk_1')->references(['ID_Prodi'])->on('prodi')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['ID_User'], 'pengelola_ibfk_2')->references(['ID_User'])->on('pengguna')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengelola', function (Blueprint $table) {
            $table->dropForeign('pengelola_ibfk_1');
            $table->dropForeign('pengelola_ibfk_2');
        });
    }
};
