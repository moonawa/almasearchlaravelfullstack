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
        Schema::create('mot_cles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mot')->nullable();
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
        Schema::dropIfExists('mot_cles');
    }
};
