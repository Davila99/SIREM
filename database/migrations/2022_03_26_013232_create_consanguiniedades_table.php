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
        Schema::create('consanguiniedades', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
<<<<<<< HEAD
=======
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('user_edit_id')->nullable()->constrained('users');
            $table->foreignId('user_delete_id')->nullable()->constrained('users');
>>>>>>> devadminlte
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
        Schema::dropIfExists('consanguiniedades');
    }
};
