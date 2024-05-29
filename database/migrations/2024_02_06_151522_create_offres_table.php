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
        Schema::create('offres', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->string('nomposte')->nullable();
            $table->text('description')->nullable();
            $table->integer('nombredeposte')->nullable();
            $table->string('annexperience')->nullable();
            $table->string('salaire')->nullable();
            $table->date('datedebut')->nullable();
            $table->string('lieu')->nullable();
            $table->string('typecontrat')->nullable(); 
            $table->date('datecloture')->nullable();
            $table->boolean('statusoffre')->default(0);
            $table->boolean('statuscabinet')->default(0);
           
            $table->unsignedBigInteger('entreprise_id');
            $table->foreign('entreprise_id')->references('id')->on('entreprises');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
