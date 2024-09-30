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
        Schema::create('platoinsumos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_insumo')->references('id')->on('insumos');
            $table->foreignId('id_plato')->references('id')->on('platos');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platoinsumos');
    }
};
