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
        Schema::create('student_inscris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->foreign('student_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('facultate_id');
            $table->foreign('facultate_id')->references('id')->on('facultate')->cascadeOnDelete();
            $table->foreignId('departament_id');
            $table->foreign('departament_id')->references('id')->on('facultate_departament_licenta')->cascadeOnDelete();
            $table->string('an_inscriere');
            $table->string('an_studiu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_inscris');
    }
};
