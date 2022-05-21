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
            $table->string('direccion');
            $table->integer('tutor_id')->foreign('tutor_id')
            ->references('id')->on('tutores')
            ->onDelete('tutores');
            $table->integer('sexo_id')->foreign('sexo_id')
            ->references('id')->on('sexos')
            ->onDelete('sexos');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('user_edit_id')->nullable()->constrained('users');
            $table->foreignId('user_delete_id')->nullable()->constrained('users');
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
