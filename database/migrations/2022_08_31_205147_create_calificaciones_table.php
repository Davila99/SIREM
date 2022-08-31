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
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->integer('asignaturadocente_id')->foreign('asignaturadocentes_id')
            ->references('id')->on('asignaturadocente')
            ->onDelete('set null');

            $table->integer('asignatura_id')->foreign('asignaturas_id')
            ->references('id')->on('asignatura')
            ->onDelete('set null');

            $table->integer('grado_id')->foreign('grados_id')
            ->references('id')->on('grado')
            ->onDelete('set null');

            $table->integer('estudiante_id')->foreign('estudiantes_id')
            ->references('id')->on('estudiante')
            ->onDelete('set null');

            
            $table->integer('cortes_evaluativo_id')->foreign('cortes_evaluativos_id')
            ->references('id')->on('cortes_evaluativo')
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
        Schema::dropIfExists('calificaciones');
    }
};
