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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id')->primaryKey();

            $table->timestamp('fecha_pedido')->useCurrent();
            $table->timestamp('fecha_entrega')->nullable();
            $table->timestamp('fecha_recoleccion')->nullable();

            $table->string('direccion_evento')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();

            $table->decimal('total_pedido', 12, 2)->default(0);
            $table->decimal('anticipo_pagado', 12, 2)->default(0);
            $table->text('notas_adicionales')->nullable();

            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');

            $table->integer('id_estatus_pedido')->unsigned();
            $table->foreign('id_estatus_pedido')->references('id')->on('estatus_pedidos')->onDelete('cascade');

            $table->integer('id_usuario_registra')->unsigned();
            $table->foreign('id_usuario_registra')->references('id')->on('usuarios')->onDelete('cascade');





            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
