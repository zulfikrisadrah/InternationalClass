<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('program_enrollment', function (Blueprint $table) {
        $table->id();  // ID untuk tabel pivot
        $table->foreignId('ID_program')->constrained('programs', 'ID_program')->onDelete('cascade');
        $table->foreignId('ID_Student')->constrained('students', 'ID_Student')->onDelete('cascade');
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        $table->boolean('isFinished')->default(0);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_enrollment');
    }
};
