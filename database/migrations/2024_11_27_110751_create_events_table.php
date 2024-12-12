<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('ID_Event');
            $table->string('Event_Title');
            $table->text('Event_Content');
            $table->dateTime('Event_Date');
            $table->timestamp('Publication_Date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('Event_Image');
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
        Schema::dropIfExists('events');
    }
};
