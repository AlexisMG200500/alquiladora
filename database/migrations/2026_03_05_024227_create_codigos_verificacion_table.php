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
        Schema::create('codigos_verificacion', function (Blueprint $table) {
            $table->increments('id');

    // Relación con el usuario (quien pide el código)
    $table->integer('id_usuario')->unsigned();
    $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
    
    // Datos del código
    $table->string('codigo', 10); // El PIN generado
    $table->string('metodo', 15); // 'email', 'sms' o 'whatsapp'
    
    // Seguridad
    $table->timestamp('expira_en'); // Cuándo deja de servir el código
    $table->boolean('usado')->default(false); // Para que no usen el mismo código dos veces

    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('codigos_verificacion');
    }
};
