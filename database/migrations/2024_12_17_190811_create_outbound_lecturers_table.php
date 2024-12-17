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
            $table->id('ID_outbound_lecturer');
            $table->string('lecturer_name')->nullable(); 
            $table->enum('gender', ['Male', 'Female'])->nullable(); 
            $table->string('role_in_ki')->nullable(); 
            $table->string('university_name')->nullable(); 
            $table->year('activity_year')->nullable();
            $table->unsignedBigInteger('ID_study_program')->nullable(); 
            $table->timestamps(); 

            $table->foreign('ID_study_program')->references('ID_study_program')->on('study_programs')->onDelete('cascade');
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