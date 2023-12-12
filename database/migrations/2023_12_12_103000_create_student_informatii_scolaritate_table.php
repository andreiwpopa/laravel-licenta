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
        Schema::create('student_informatii_scolaritate', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('categorie_studii');
            $table->integer('an_absolvire_liceu');
            $table->decimal('medie_bacalaureat', 4,2);
            $table->string('provenienta');
            $table->decimal('medie_admitere', 4,2);
            $table->decimal('sesiune_admitere', 4,2);
            $table->string('promotie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_informatii_scolaritate');
    }
};
