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
        Schema::create('pengelola', function (Blueprint $table) {
            $table->integer('ID_Pengelola', true);
            $table->string('Nama_Pengelola');
            $table->integer('ID_Prodi')->nullable()->index('id_prodi');
            $table->integer('ID_User')->nullable()->index('id_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengelola');
    }
};
