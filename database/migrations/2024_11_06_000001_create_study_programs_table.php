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
            $table->text('study_program_Description');
            $table->string('study_program_Image');
            $table->integer('classrooms')->default(0);
            $table->integer('lecturers')->default(0);
            $table->string('national_accreditation');
            $table->string('international_accreditation');
            $table->string('approval_sk')->nullable();
            $table->year('opening_year')->nullable();
            $table->string('director_name')->nullable();
            $table->string('director_contact')->nullable();
            $table->double('ukt_fee')->nullable();
            $table->double('ipi_fee')->nullable();
            $table->string('international_exposure')->nullable();
            $table->integer('total_courses')->default(0);
            $table->integer('rps_courses_in_english')->default(0);
            $table->integer('teaching_materials_in_english')->default(0);
            $table->integer('courses_delivered_in_english')->default(0);
            $table->integer('courses_fully_filled_in_sikola')->default(0);
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
