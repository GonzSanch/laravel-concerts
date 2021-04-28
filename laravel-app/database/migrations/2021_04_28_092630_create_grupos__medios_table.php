<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposMediosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos__medios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_medio');
            $table->foreignId('id_concierto');
            $table->timestamps();

            $table->foreign('id_medio')->references('id')->on('medios');
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
        Schema::dropIfExists('grupos__medios');
    }
}
