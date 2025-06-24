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
        Schema::create('habit_lists', function (Blueprint $table) {
            $table->id();
            $table-> unsignedBigInteger("user_id");
            $table-> unsignedBigInteger("id_habit");
            $table->integer('quantity_start');
            $table->integer('quantity_end');
            $table->timestamps();

        //set foreing keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('id_habit')->references('id')->on('habits');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habit_lists');
    }
};
