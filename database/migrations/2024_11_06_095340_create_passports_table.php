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
        Schema::create('passports', function (Blueprint $table) {
            $table->string('Passport_Number', 20)->primary();
            $table->date('Passport_Expiration_Date');
            $table->string('Passport_Issuing_Place', 100)->nullable();
            $table->date('Passport_Issuance_Date')->nullable();
            $table->unsignedBigInteger('ID_Student');

            $table->foreign('ID_Student')->references('ID_Student')->on('students')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passports');
    }
};
