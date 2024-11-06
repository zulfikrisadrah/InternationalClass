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
        Schema::create('kerjasama', function (Blueprint $table) {
            $table->integer('ID_Kerjasama')->primary();
            $table->string('No_MoU_MoA_IA', 50)->nullable();
            $table->string('Judul_Kerjasama', 100)->nullable();
            $table->date('Masa_Berlaku')->nullable();
            $table->integer('ID_Prodi')->nullable()->index('id_prodi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerjasama');
    }
};
