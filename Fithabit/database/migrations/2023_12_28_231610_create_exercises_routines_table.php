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
        Schema::create('exercises_routines', function (Blueprint $table) {
            $table->id();
            $table-> unsignedBigInteger("id_exercise");  
            $table-> unsignedBigInteger("id_rutine");  
    
    
        //set foreing keys
            $table->foreign('id_exercise')->references('id')->on('exercises');
            $table->foreign('id_rutine')->references('id')->on('routines');
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises_routines');
    }
};
