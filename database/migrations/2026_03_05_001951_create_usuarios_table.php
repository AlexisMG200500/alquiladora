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
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('email')->unique();
            $table->string('contrasena'); 
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('usar_2fa_email')->default(false);
            $table->string('telefono', 10);
            $table->timestamp('telefono_verified_at')->nullable();
            $table->boolean('usar_2fa_telefono')->default(false);
            $table->integer('id_rol')->unsigned();
            $table->foreign('id_rol')->references('id')->on('roles')->onDelete('cascade');
            $table->string('imagen')->nullable();
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
