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
        Schema::table('propositions', function (Blueprint $table) {
            $table->unsignedBigInteger('interlocuteurcbt_id')->nullable();

            $table->foreign('interlocuteurcbt_id')->references('id')->on('interlocuteurcbts');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('propositions', function (Blueprint $table) {
            //
        });
    }
};
