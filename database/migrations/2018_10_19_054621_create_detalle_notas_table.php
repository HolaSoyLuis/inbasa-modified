<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_notas', function (Blueprint $table) {
            $table->increments('id');

            //Campos
            $table->float('nota',2);

            //Llaves foráneas
            $table->unsignedInteger('nota_id');
            $table->foreign('nota_id')->references('id')->on('notas')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('aspecto_id')->nullable();
            $table->foreign('aspecto_id')->references('id')->on('aspectos')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedInteger('tipo_evaluacion_id')->nullable();
            $table->foreign('tipo_evaluacion_id')->references('id')->on('tipo_evaluaciones')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedInteger('bloque_id')->nullable();
            $table->foreign('bloque_id')->references('id')->on('bloques')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedInteger('estudiante_id')->nullable();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedInteger('curso_id')->nullable();;
            $table->foreign('curso_id')->references('id')->on('cursos')->onUpdate('cascade')->onDelete('set null');

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
        Schema::dropIfExists('detalle_notas');
    }
}
