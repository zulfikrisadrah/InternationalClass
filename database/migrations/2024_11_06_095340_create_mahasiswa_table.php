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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->integer('ID_Mahasiswa', true);
            $table->string('Nama_Mahasiswa', 100);
            $table->string('NIM', 20)->unique('nim');
            $table->string('Email_Mahasiswa', 100)->nullable();
            $table->string('Asal_Negara', 50)->nullable();
            $table->integer('ID_User')->nullable()->index('id_user');
            $table->integer('ID_Prodi')->nullable()->index('id_prodi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
