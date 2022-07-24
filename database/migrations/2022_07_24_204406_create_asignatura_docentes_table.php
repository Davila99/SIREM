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
            $table->integer('asignatura_id')->foreign('asignaturas_id')
            ->references('id')->on('asignatura')
            ->onDelete('set null');

            $table->integer('empleado_id')->foreign('empleados_id')
            ->references('id')->on('empleado')
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
        Schema::dropIfExists('asignatura_docentes');
    }
};

