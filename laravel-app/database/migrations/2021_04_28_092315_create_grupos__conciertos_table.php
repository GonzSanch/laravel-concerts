<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposConciertosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos__conciertos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_grupo');
            $table->foreignId('id_concierto');
            $table->timestamps();

            $table->foreign('id_grupo')->references('id')->on('grupos');
            $table->foreign('id_concierto')->references('id')->on('concierto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos__conciertos');
    }
}
