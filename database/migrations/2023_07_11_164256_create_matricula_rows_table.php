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
        Schema::create('matricula_rows', function (Blueprint $table) {
            $table->id();
            $table->integer('asignatura_docente_id')->foreign('asignatura_docente_id')
            ->references('id')->on('asignatura_docentes')
            ->onDelete('set null');

            $table->integer('matricula_id')->foreign('matricula_id')
            ->references('id')->on('matriculas')
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
        Schema::dropIfExists('matricula_rows');
    }
};
