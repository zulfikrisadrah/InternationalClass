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
        Schema::create('collaborations', function (Blueprint $table) {
            $table->id('ID_Collaboration')->primary();
            $table->string('MoU_MoA_IA_Number', 50)->nullable();
            $table->string('Collaboration_Title', 100)->nullable();
            $table->date('Validity_Period')->nullable();
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
        Schema::dropIfExists('collaborations');
    }
};
