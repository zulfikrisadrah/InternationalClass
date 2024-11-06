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
        Schema::table('mata_kuliah', function (Blueprint $table) {
            $table->foreign(['ID_Prodi'], 'mata_kuliah_ibfk_1')->references(['ID_Prodi'])->on('prodi')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mata_kuliah', function (Blueprint $table) {
            $table->dropForeign('mata_kuliah_ibfk_1');
        });
    }
};
