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
        Schema::create('usuarios', function (Blueprint $table) {
    // 1. Identificación
    $table->increments('id'); // PK
    
    // 2. Datos Personales (Los que pediste)
    $table->string('nombre');
    $table->string('apellido_paterno');
    $table->string('apellido_materno');
    $table->string('imagen')->nullable(); // Foto de perfil

    // 3. Login y Seguridad 2FA
    $table->string('email')->unique();
    $table->string('contrasena'); 
    $table->integer('id_rol')->unsigned();
    $table->foreign('id_rol')->references('id')->on('roles')->onDelete('cascade');

    // 4. Verificación de Correo
    $table->timestamp('email_verified_at')->nullable();
    $table->boolean('usar_2fa_email')->default(false); // Checkbox: "¿Activar seguridad por correo?"

    // 5. Verificación de Teléfono
    $table->string('telefono', 10); // Sin unique aquí si quieres permitir repetidos, pero cuidado con el 2FA
    $table->timestamp('telefono_verified_at')->nullable();
    $table->boolean('usar_2fa_telefono')->default(false); // Checkbox: "¿Activar seguridad por SMS?"

    $table->timestamps();
    $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
