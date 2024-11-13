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
        Schema::create('lecturer_outbound', function (Blueprint $table) {
            $table->id('ID_Lecturer_Outbound')->primary();
            $table->string('Partner_Lecturer_Name', 100)->nullable();
            $table->string('Gender', 10)->nullable();
            $table->string('Role', 50)->nullable();
            $table->string('University_Origin', 100)->nullable();
            $table->year('Activity_Year')->nullable();
            $table->unsignedBigInteger('ID_Program');
            $table->unsignedBigInteger('ID_Activity');

            $table->foreign('ID_Program')->references('ID_Program')->on('programs')->onDelete('cascade');
            $table->foreign('ID_Activity')->references('ID_Activity')->on('ie_activities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturer_outbound');
    }
};
