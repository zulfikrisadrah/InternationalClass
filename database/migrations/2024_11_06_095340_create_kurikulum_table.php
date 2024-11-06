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
        Schema::create('kurikulum', function (Blueprint $table) {
            $table->integer('ID_Kurikulum')->primary();
            $table->integer('Jumlah_MK')->nullable();
            $table->integer('Jumlah_RPS_Bahasa_Inggris')->nullable();
            $table->integer('Jumlah_Bahan_Ajar_Bahasa_Inggris')->nullable();
            $table->integer('Jumlah_MK_Disampaikan_Bahasa_Inggris')->nullable();
            $table->integer('Jumlah_MK_Di_Sikola')->nullable();
            $table->integer('ID_Prodi')->nullable()->index('id_prodi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kurikulum');
    }
};
