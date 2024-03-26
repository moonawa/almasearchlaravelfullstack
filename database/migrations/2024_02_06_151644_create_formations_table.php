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
        Schema::create('formations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nomformation')->nullable();
            $table->string('etablissementformation')->nullable();
            $table->string('anneeacademique')->nullable();
            $table->date('datedebutformation')->nullable();
            $table->date('datefinformation')->nullable();
            $table->string('niveauformation')->nullable();
            $table->unsignedBigInteger('candidat_id');
            $table->foreign('candidat_id')->references('id')->on('candidats');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
