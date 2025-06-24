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
        Schema::create('user_guided', function (Blueprint $table) {
            $table->id();
            $table-> unsignedBigInteger("id_user");  
            $table-> unsignedBigInteger("id_class");  
    
    
        //set foreing keys
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_class')->references('id')->on('guided_classes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_guided');
    }
};
