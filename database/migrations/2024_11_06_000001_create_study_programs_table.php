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
        Schema::create('study_programs', function (Blueprint $table) {
            $table->id('ID_study_program');
            $table->string('study_program_Name');
            $table->string('degree');
            $table->text('study_program_Description')->nullable();
            $table->string('study_program_Image')->nullable();
            $table->string('International_Accreditation')->nullable();
            $table->unsignedBigInteger('ID_Faculty');

            $table->foreign('ID_Faculty')->references('ID_Faculty')->on('faculties')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_programs');
    }
};
