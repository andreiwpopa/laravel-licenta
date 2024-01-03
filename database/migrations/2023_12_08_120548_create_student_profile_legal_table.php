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
        Schema::create('student_profile_legal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sp_id');
            $table->foreign('sp_id')->references('id')->on('student_profile')->cascadeOnDelete();
            $table->string('mediu');
            $table->string('strain');
            $table->string('minoritar');
            $table->string('cetatenie');
            $table->string('nationalitate');
            $table->string('cnp');
            $table->string('serie');
            $table->string('stare_civila');
            $table->string('situatie_militara');
            $table->string('nr_livret_militar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_profile_legal');
    }
};
