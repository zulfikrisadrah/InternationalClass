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
            $table->string('mou_moa_ia_number')->nullable(); 
            $table->string('title_of_cooperation')->nullable(); 
            $table->year('validity_period')->nullable(); 
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
        Schema::dropIfExists('partnership');
    }
};