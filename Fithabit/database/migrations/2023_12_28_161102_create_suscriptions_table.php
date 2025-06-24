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
        Schema::create('suscriptions', function (Blueprint $table) {
            $table->id();
            $table-> unsignedBigInteger("user_id");
            $table-> unsignedBigInteger("id_suscription_type");
            $table->date('suscription_date');
            $table->enum('estatus', ['activa', 'caducada']);

           // $table->timestamps();
          //claves foraneas
          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('id_suscription_type')->references('id')->on('suscription_types');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suscriptions');
    }
};
