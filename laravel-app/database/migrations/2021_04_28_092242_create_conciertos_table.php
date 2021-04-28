<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConciertosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conciertos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_promotor');
            $table->foreignId('id_recinto');
            $table->string('nombre', 100);
            $table->integer('numero_espectadores');
            $table->timestamp('fecha'); //or use date()
            $table->integer('rentabilidad');
            $table->timestamps();

            $table->foreign('id_promotor')->references('id')->on('promotores');
            $table->foreign('id_recinto')->references('id')->on('recintos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conciertos');
    }
}
