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
        Schema::table('paspor', function (Blueprint $table) {
            $table->foreign(['ID_Mahasiswa'], 'paspor_ibfk_1')->references(['ID_Mahasiswa'])->on('mahasiswa')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paspor', function (Blueprint $table) {
            $table->dropForeign('paspor_ibfk_1');
        });
    }
};
