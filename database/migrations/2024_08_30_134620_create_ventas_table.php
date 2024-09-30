<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha');
            $table->double('total');
            $table->foreignId('id_local')->references('id')->on('locals');
            $table->timestamps();
        });
    }

 
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
