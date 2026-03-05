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
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id')->primaryKey();

            $table->string('nombre_completo');
            $table->string('rfc')->nullable();
            $table->string('telefono', 10);
            $table->string('email_contacto');
            $table->string('direccion');

            // ! coordenadas
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->integer('id_estado')->unsigned();
            $table->foreign('id_estado')->references('id')->on('estados')->onDelete('cascade');
            
            // ! Usuario que registra
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
        Schema::dropIfExists('clientes');
    }
};
