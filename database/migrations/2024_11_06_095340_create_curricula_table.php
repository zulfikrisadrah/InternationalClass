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
        Schema::create('curricula', function (Blueprint $table) {
            $table->id('ID_Curriculum')->primary();
            $table->integer('Total_Courses')->nullable();
            $table->integer('Total_English_RPS')->nullable();
            $table->integer('Total_English_Learning_Materials')->nullable();
            $table->integer('Total_Courses_Taught_In_English')->nullable();
            $table->integer('Total_Courses_In_School')->nullable();
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
        Schema::dropIfExists('curricula');
    }
};
