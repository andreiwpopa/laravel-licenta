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
        Schema::create('departament_discipline_licenta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('departament_id');
            $table->foreign('departament_id')->on('facultate_departament_licenta')->references('id')->cascadeOnDelete();
            $table->string('disciplina_name');
            $table->integer('disciplina_credit');
            $table->integer('an');
            $table->string('semestru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departament_discipline_licenta');
    }
};
