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
        Schema::create('ie_activities', function (Blueprint $table) {
            $table->id('ID_Activity');
            $table->string('Activity_Name');
            $table->string('Country_of_Execution', 50);
            $table->date('Execution_Date');
            $table->integer('Participants_Count');
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
        Schema::dropIfExists('ie_activities');
    }
};
