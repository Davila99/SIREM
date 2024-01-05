<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grado_id')->constrained()
            ->references('id')->on('grados')
            ->restrictOnDelete();
            $table->string('anio_lectivo',5);
            $table->foreignId('empleado_id')->constrained()
            ->references('id')->on('empleados')
            ->restrictOnDelete();   
            $table->foreignId('seccion_id')->constrained()
            ->references('id')->on('seccions')
            ->restrictOnDelete();
            $table->foreignId('turno_id')->constrained()
            ->references('id')->on('turnos')
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
        Schema::dropIfExists('grupos');
    }
};
