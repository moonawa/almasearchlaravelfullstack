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
        Schema::create('interlocuteurcbts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fonctioncbt')->nullable();
            $table->string('autrecbt')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('cabinet_id');
            $table->foreign('cabinet_id')->references('id')->on('cabinets');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interlocuteurcbts');
    }
};
