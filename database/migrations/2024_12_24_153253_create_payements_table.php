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
        Schema::create('payements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('montantpayement')->nullable();
            $table->date('datepayement')->nullable();
            $table->unsignedBigInteger('entreprise_id')->nullable();
            $table->foreign('entreprise_id')->references('id')->on('entreprises');
            $table->unsignedBigInteger('cabinet_id')->nullable();
            $table->foreign('cabinet_id')->references('id')->on('cabinets');
            $table->unsignedBigInteger('candidat_id')->nullable();
            $table->foreign('candidat_id')->references('id')->on('candidats');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payements');
    }
};
