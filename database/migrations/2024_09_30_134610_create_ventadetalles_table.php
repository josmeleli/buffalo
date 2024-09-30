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
        Schema::create('ventadetalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_venta')->references('id')->on('ventas');
            $table->foreignId('id_plato')->references('id')->on('platos');
            $table->integer('cantidad');
            $table->double('precio_unitario');
            $table->double('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventadetalles');
    }
};
