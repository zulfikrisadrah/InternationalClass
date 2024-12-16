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
        Schema::create('programs', function (Blueprint $table) {
            $table->id('ID_program');
            $table->string('program_Name');
            $table->text('program_description');
            $table->string('Country_of_Execution', 50);
            $table->date('Execution_Date');
            $table->integer('Participants_Count');
            $table->string('program_Image');
            $table->unsignedBigInteger('ID_Ie_program');
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ID_Ie_program')->references('ID_Ie_program')->on('ie_programs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
