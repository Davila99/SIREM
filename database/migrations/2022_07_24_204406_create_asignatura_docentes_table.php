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
        Schema::create('asignatura_docentes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organizacion_academica_id')->constrained()
            ->references('id')->on('organizacion_academicas')
            ->restrictOnDelete();
            $table->foreignId('asignatura_id')->constrained()
            ->references('id')->on('asignaturas')
            ->restrictOnDelete();
            $table->foreignId('empleado_id')->constrained()
            ->references('id')->on('empleados')
            ->restrictOnDelete();
            $table->foreignId('grupo_id')->constrained()
            ->references('id')->on('grupos')
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
        Schema::dropIfExists('asignatura_docentes');
    }
};

