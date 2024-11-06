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
        Schema::create('prodi', function (Blueprint $table) {
            $table->integer('ID_Prodi', true);
            $table->string('Nama_Prodi');
            $table->string('Jenjang', 50);
            $table->text('Deskripsi_Prodi');
            $table->string('SK_Persetujuan_KI');
            $table->integer('Tahun_Pembuatan_KI');
            $table->string('Link_Website');
            $table->string('Nama_Ketua_Pengelola');
            $table->integer('No_WA_Ketua_Pengelola');
            $table->integer('Jumlah_Ruang_Kelas');
            $table->integer('Jumlah_Dosen_KI');
            $table->string('Jenis_IE', 50);
            $table->double('Biaya_UKT_Mahasiswa');
            $table->double('Biaya_DP_IP_Mahasiswa');
            $table->string('Link_Foto_Kegiatan');
            $table->string('Akreditasi_Internasional_Prodi', 50);
            $table->integer('ID_Fakultas')->nullable()->index('id_fakultas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodi');
    }
};
