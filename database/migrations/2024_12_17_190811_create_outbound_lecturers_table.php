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
        Schema::create('outbound_lecturers', function (Blueprint $table) {
            $table->id('ID_outbound_lecturer'); // Primary key
            $table->string('lecturer_name')->nullable(); // Nama Dosen (Nullable)
            $table->enum('gender', ['M', 'F'])->nullable(); // Gender (Nullable)
            $table->string('role_in_ki')->nullable(); // Peran dalam Kegiatan Kelas Internasional (Nullable)
            $table->string('university_name')->nullable(); // Asal Universitas (Nullable)
            $table->year('activity_year')->nullable(); // Tahun Kegiatan (Nullable)
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
        Schema::dropIfExists('outbound_lecturers');
    }
};