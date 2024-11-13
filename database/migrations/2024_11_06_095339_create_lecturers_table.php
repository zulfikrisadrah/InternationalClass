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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id('ID_Lecturer');
            $table->string('Lecturer_Name');
            $table->string('NIP', 50)->unique('NIP');
            $table->string('Lecturer_Email');
            $table->unsignedBigInteger('ID_Program');

            $table->foreign('ID_Program')->references('ID_Program')->on('programs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturers');
    }
};
