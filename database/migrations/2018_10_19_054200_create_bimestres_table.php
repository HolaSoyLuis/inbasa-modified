<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBimestresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bimestres', function (Blueprint $table) {
            $table->increments('id');

            //Campos
            $table->string('bimestre',15);

            //Llaves foráneas
            $table->unsignedInteger('ciclo_id')->nullable();
            $table->foreign('ciclo_id')->references('id')->on('ciclos')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('bimestres');
    }
}
