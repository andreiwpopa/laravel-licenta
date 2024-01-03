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
        Schema::create('facultate_departament_licenta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facultate_id')->index();
            $table->foreign('facultate_id')->on('facultate')->references('id')->cascadeOnDelete();
            $table->string('departament_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facultate_departament_licenta');
    }
};
