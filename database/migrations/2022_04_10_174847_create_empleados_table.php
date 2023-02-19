<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('cedula');
            $table->string('fecha_nacimiento');
            $table->foreignId('nivel_academico_id')->constrained()
            ->references('id')->on('niveles_academicos')
            ->restrictOnDelete();
            $table->string('direccion');
            $table->string('email');
            $table->string('fecha_ingreso');
            $table->foreignId('cargos_id')->constrained()
            ->references('id')->on('cargos')
            ->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
};
