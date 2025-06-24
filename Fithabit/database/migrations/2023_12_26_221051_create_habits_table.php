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
        Schema::create('habits', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->timestamps();
        });

        Schema::create('habit_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('habit_id');
            $table->string('locale')->index();

            //Todas las columnas traducibles
            $table->string('name');
            $table->string('value');
            // $table->string('description');
            $table->timestamps();

            $table->foreign('habit_id')->references('id')->on('habits');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habits');
    }
};
