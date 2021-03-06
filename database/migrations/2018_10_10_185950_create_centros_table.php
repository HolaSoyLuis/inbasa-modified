<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',150);
            $table->string('direccion',100)->nullable();
            $table->string('departamento',45);
            $table->string('ciudad',45);
            $table->string('nit',25)->nullable();
            $table->string('logo',255)->nullable();
            $table->string('telefono1',15);
            $table->string('telefono2',15)->nullable();
            
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
        Schema::dropIfExists('centros');
    }
}
