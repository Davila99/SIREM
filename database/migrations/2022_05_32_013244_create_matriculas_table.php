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
            $table->foreignId('user_id')->constrained('users')
            ->restrictOnDelete();
            $table->foreignId('estudiante_id')->constrained()
            ->references('id')->on('estudiantes')
            ->restrictOnDelete(); 
            $table->foreignId('grupo_id')->constrained()
            ->references('id')->on('grupos')
            ->restrictOnDelete();  
            $table->foreignId('tipo_matricula_id')->constrained()
            ->references('id')->on('tipo__matriculas')
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
        Schema::dropIfExists('matriculas');
    }
};
