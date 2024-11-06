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
        Schema::create('paspor', function (Blueprint $table) {
            $table->string('Nomor_Paspor', 20)->primary();
            $table->date('Tanggal_Kadaluwarsa_Paspor');
            $table->string('Tempat_Penerbitan_Paspor', 100)->nullable();
            $table->date('Tanggal_Penerbitan_Paspor')->nullable();
            $table->integer('ID_Mahasiswa')->nullable()->index('id_mahasiswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paspor');
    }
};
