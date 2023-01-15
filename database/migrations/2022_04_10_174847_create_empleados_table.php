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
            $table->integer('nivel_academico_id')->foreign('nivel_academico_id')
            ->references('id')->on('niveles_academicos')
            ->onDelete('set null');
            $table->string('direccion');
            $table->string('email');
            $table->string('fecha_ingreso');
            $table->integer('cargos_id')->foreign('cargos_id')
            ->references('id')->on('cargos')
            ->onDelete('set null');
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
