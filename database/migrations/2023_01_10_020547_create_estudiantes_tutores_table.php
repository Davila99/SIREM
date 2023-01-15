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
        Schema::create('estudiantes_Tutores', function (Blueprint $table) {
            $table->id();
            $table->integer('estudiante_id')->foreign('estudiantes_id')
            ->references('id')->on('estudiante')
            ->onDelete('set null');

            $table->integer('tutores_id')->foreign('tutores_id')
            ->references('id')->on('tutores')
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
        Schema::dropIfExists('estudiantes_tutores');
    }
};
