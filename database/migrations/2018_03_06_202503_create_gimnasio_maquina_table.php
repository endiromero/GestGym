<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGimnasioMaquinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gimnasio_maquina', function (Blueprint $table) {
            // Definimos los campos
            $table->integer('gimnasio_id')->unsigned();
            $table->integer('maquina_id')->unsigned();

            // Definimos la clave principal
            $table->primary(['gimnasio_id', 'maquina_id']);

            // Definimos las claves foráneas
            $table->foreign('gimnasio_id')->references('id')->on('gimnasios')->onDelete('cascade');
            $table->foreign('maquina_id')->references('id')->on('maquinas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gimnasio_maquina');
    }
}
