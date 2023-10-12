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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('codigo_estudiante')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('edad')->nullable();
            $table->string('direccion')->nullable();
            $table->foreignId('tutor_id')->nullable()->constrained()
            ->references('id')->on('tutores')
            ->restrictOnDelete();
            $table->foreignId('sexo_id')->nullable()->constrained()
            ->references('id')->on('sexos')
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
        Schema::dropIfExists('estudiantes');
    }
};
