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
        Schema::create('berita', function (Blueprint $table) {
            $table->integer('ID_Berita', true);
            $table->string('Judul_Pengumuman');
            $table->text('Isi_Berita');
            $table->date('Tanggal_Terbit')->nullable();
            $table->integer('ID_User')->nullable()->index('id_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
