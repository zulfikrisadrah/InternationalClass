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
        Schema::create('gelar', function (Blueprint $table) {
            $table->integer('ID_Gelar', true);
            $table->string('Gelar', 50);
            $table->string('Negara_Pelaksanaan');
            $table->date('Tanggal_Pelaksanaan');
            $table->integer('ID_Prodi')->nullable()->index('id_prodi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gelar');
    }
};
