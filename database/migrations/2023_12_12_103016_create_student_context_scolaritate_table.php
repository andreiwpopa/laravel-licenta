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
        Schema::create('student_context_scolaritate', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sp_id');
            $table->foreign('sp_id')->references('id')->on('student_profile')->cascadeOnDelete();
            $table->foreignId('facultate_id');
            $table->foreign('facultate_id')->references('id')->on('facultate');
            $table->foreignId('departament_id');
            $table->foreign('departament_id')->references('id')->on('facultate_departament_licenta');
            $table->string('forma_de_invatamant');
//            $table->string('modul');
//            $table->string('grupa');
//            $table->bigInteger('numar_matricol');
//            $table->string('status_curent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_context_scolaritate');
    }
};
