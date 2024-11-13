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
        Schema::create('lecture_schedule', function (Blueprint $table) {
            $table->id('ID_Schedule');
            $table->string('Day', 50);
            $table->time('Start_Time');
            $table->time('End_Time');
            $table->unsignedBigInteger('ID_Lecturer');
            $table->unsignedBigInteger('ID_Course');

            $table->foreign('ID_Lecturer')->references('ID_Lecturer')->on('lecturers')->onDelete('cascade');
            $table->foreign('ID_Course')->references('ID_Course')->on('courses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecture_schedule');
    }
};
