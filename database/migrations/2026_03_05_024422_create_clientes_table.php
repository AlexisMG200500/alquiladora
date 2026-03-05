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
            $table->increments('id');

    // =========================================================================
    // 1. VÍNCULO DE ACCESO (NUEVO E INDISPENSABLE)
    // =========================================================================
    // Si el cliente se registra por Web, aquí guardamos su ID de Usuario.
    // Es nullable porque si registras a una abuelita en mostrador, no necesita usuario.
    $table->integer('id_usuario')->unsigned()->nullable()->unique(); 
    $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');

    // 2. Datos del Perfil (Tus campos originales)
    $table->string('nombre_completo'); // O Razón Social
    $table->string('rfc')->nullable();
    $table->string('telefono', 10);    // Teléfono de contacto para la entrega
    $table->string('email_contacto');  // Email para enviar la factura/cotización
    $table->string('direccion');       // Dirección escrita

    // 3. Coordenadas y Ubicación (Tus campos originales)
    $table->string('latitud')->nullable();
    $table->string('longitud')->nullable();
    
    $table->integer('id_estado')->unsigned();
    $table->foreign('id_estado')->references('id')->on('estados');
    
    // =========================================================================
    // 4. AUDITORÍA (CORREGIDO)
    // =========================================================================
    // id_usuario_registra:
    // - Si es NULL: El cliente se registró solo por internet.
    // - Si tiene ID: Fue un empleado quien lo dio de alta.
    $table->integer('id_usuario_registra')->unsigned()->nullable(); 
    $table->foreign('id_usuario_registra')->references('id')->on('usuarios');

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
