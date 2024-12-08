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
        Schema::create('students', function (Blueprint $table) {
            $table->id('ID_Student');
            $table->string('Student_Name', 100);
            $table->string('Student_ID_Number', 20)->unique('NIM');
            $table->string('Student_Email', 100)->nullable();
            $table->string('Country_of_Origin', 50)->nullable();
            $table->boolean('isActive')->default(1);
            $table->boolean('isVerified')->default(0);
            $table->string('Profile_Photo')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ID_study_program');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ID_study_program')->references('ID_study_program')->on('study_programs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
