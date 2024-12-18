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
            $table->string('Student_Email', 100);
            $table->boolean('isActive')->default(0);
            $table->boolean('isVerified')->default(0);
            $table->enum('Gender', ['L', 'P'])->nullable();
            $table->integer('English_Score')->nullable();
            $table->enum('status', ['accepted', 'rejected', 'waiting'])->nullable();
            $table->string('NIK', 20)->nullable();
            $table->string('NISN', 20)->nullable();
            $table->string('Phone_Number', 20)->nullable();
            $table->string('Home_Phone', 20)->nullable();
            $table->string('Address', 255)->nullable();
            $table->string('Postal_Code', 10)->nullable();
            $table->string('Birth_Place', 100)->nullable();
            $table->date('Birth_Date')->nullable();
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
