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
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->string('fecha');
            $table->integer('user_id')->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('set null');
            $table->integer('estudiante_id')->foreign('estudiante_id')
            ->references('id')->on('estudiantes')
            ->onDelete('set null');
            $table->integer('tipo_matricula_id')->foreign('tipo_matricula_id')
            ->references('id')->on('tipo_matriculas')
            ->onDelete('set null');
            $table->integer('grupo_id')->foreign('grupo_id')
            ->references('id')->on('grupos')
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
        Schema::dropIfExists('matriculas');
    }
};
