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
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->default(now());
            $table->foreignId('empleado_id')->constrained('empleados')
                ->restrictOnDelete();
            $table->foreignId('asignatura_id')->constrained('asignaturas')
                ->restrictOnDelete();
            $table->foreignId('corte_evaluativo_id')->constrained('cortes_evaluativos')
                ->restrictOnDelete();
            $table->foreignId('grupo_id')->constrained('grupos')
                ->restrictOnDelete();
            $table->string('observaciones')->nullable();
            $table->string('promedio')->nullable();
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
