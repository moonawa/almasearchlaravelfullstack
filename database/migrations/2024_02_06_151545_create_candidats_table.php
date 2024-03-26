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
        Schema::create('candidats', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('fonction')->nullable();
            $table->string('residence')->nullable();
            $table->date('birthday')->nullable();
            $table->string('situationmatrimonaile')->nullable();
            $table->string('handicap')->nullable();
            $table->string('genre')->nullable();
            $table->string('permisconduire')->nullable();
            $table->text('accroche')->nullable();
            $table->string('disponibilite')->nullable();
            $table->string('nationnalite')->nullable();
            $table->string('lieudemobilite')->nullable();
            $table->string('cv')->nullable();
            $table->string('motivation')->nullable();
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('cabinet_id')->nullable();
            $table->foreign('cabinet_id')->references('id')->on('cabinets');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};
