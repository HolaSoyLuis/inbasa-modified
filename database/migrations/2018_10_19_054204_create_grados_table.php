<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grados', function (Blueprint $table) {
            $table->increments('id');
            //Llaves foráneas
            $table->unsignedInteger('ciclo_id')->nullable();
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
            $table->unsignedInteger('jornada_id')->nullable();
            $table->foreign('jornada_id')->references('id')->on('jornadas');
            //Campos
            $table->string('grado',45);
            $table->softDeletes();
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
        Schema::dropIfExists('grados');
    }
}
