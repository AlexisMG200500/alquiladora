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
            $table->increments('id')->primaryKey();

            // Relación con el usuario
    $table->integer('id_usuario')->unsigned();
    $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
    
    // El Código (Ej: "892103")
    $table->string('codigo', 10);
    
    // Para saber por dónde se envió ('email' o 'sms')
    $table->string('metodo', 10); 
    
    // Seguridad: Cuándo caduca este código (Ej: 10 min después de crearlo)
    $table->timestamp('expira_en');

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
