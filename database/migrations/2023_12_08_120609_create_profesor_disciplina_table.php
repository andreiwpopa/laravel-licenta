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
        Schema::create('profesor_disciplina', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profesor_id');
            $table->foreign('profesor_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('facultate_id');
            $table->foreign('facultate_id')->references('id')->on('facultate')->cascadeOnDelete();
            $table->foreignId('departament_id');
            $table->foreign('departament_id')->references('id')->on('facultate_departament_licenta')->cascadeOnDelete();
            $table->foreignId('disciplina_id');
            $table->foreign('disciplina_id')->references('id')->on('departament_discipline_licenta')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['profesor_id','facultate_id', 'disciplina_id'], 'unique_profesor_disciplina');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesor_disciplina');
    }
};
