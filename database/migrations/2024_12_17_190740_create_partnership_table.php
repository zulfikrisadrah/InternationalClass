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
        Schema::create('partnership', function (Blueprint $table) {
            $table->id('ID_partnership');
            $table->string('mou_moa_ia_number')->nullable(); // Nomor MoU/MoA/IA (Nullable)
            $table->string('title_of_cooperation')->nullable(); // Judul Kerjasama (Nullable)
            $table->year('validity_period')->nullable(); // Masa Berlaku (Nullable)
            $table->unsignedBigInteger('study_program_id')->nullable(); // Kolom relasi ke tabel study_programs (Nullable)
            $table->timestamps(); // created_at dan updated_at

            // Menambahkan foreign key yang merujuk ke study_programs
            $table->foreign('study_program_id')->references('ID_study_program')->on('study_programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partnership');
    }
};