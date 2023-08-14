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
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('fecha_nacimiento');
            $table->string('edad');
            $table->string('direccion');
            $table->foreignId('tutor_id')->constrained()
            ->references('id')->on('tutores')
            ->restrictOnDelete();
            $table->foreignId('sexo_id')->constrained()
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
