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
        Schema::create('evennements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomevent')->nullable();
            $table->date('dateevent')->nullable();
            $table->dateTime('dateevennement')->nullable();
            $table->string('lieuevent')->nullable();
            $table->string('description')->nullable();
            $table->string('photo')->nullable();
            $table->string('statusevent')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evennements');
    }
};
