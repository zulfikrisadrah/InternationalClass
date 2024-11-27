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
            $table->id('ID_Program');
            $table->string('Program_Name');
            $table->string('Level');
            $table->text('Program_Description')->nullable();
            $table->string('Approval_Letter_SK')->nullable();
            $table->year('Creation_Year_SK')->nullable();
            $table->string('Website_Link')->nullable();
            $table->string('Program_Head_Name')->nullable();
            $table->string('Program_Head_Contact_No')->nullable();
            $table->integer('Classroom_Count')->nullable();
            $table->integer('KI_Teacher_Count')->nullable();
            $table->string('IE_Type')->nullable();
            $table->decimal('Student_UKT_Fee', 10, 2)->nullable();
            $table->decimal('Student_DP_IPI_Fee', 10, 2)->nullable();
            $table->string('Activity_Photo_Link')->nullable();
            $table->string('Programs_Image')->nullable();
            $table->boolean('International_Accreditation')->default(false);
            $table->unsignedBigInteger('ID_Faculty');
            $table->unsignedBigInteger('ID_Degree');

            $table->foreign('ID_Faculty')->references('ID_Faculty')->on('faculties')->onDelete('cascade');
            $table->foreign('ID_Degree')->references('ID_Degree')->on('degrees')->onDelete('cascade');
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
