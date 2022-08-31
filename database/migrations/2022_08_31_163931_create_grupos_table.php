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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->integer('grados_id')->foreign('grados_id')
            ->references('id')->on('grado')
            ->onDelete('set null');

            $table->integer('niveles_academico_id')->foreign('niveles_academico_id')
            ->references('id')->on('niveles_academico_id')
            ->onDelete('set null');

            $table->integer('asignaturadocente_id')->foreign('asignaturadocente_id')
            ->references('id')->on('asignaturadocente_id')
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
        Schema::dropIfExists('grupos');
    }
};