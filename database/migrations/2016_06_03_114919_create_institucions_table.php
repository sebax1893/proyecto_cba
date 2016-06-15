<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institucions', function (Blueprint $t) {
            $t->increments('id_institucions');

            //Foreign Key municipios
            $t->integer('id_municipios')->unsigned();
            $t->foreign('id_municipios')->references('id_municipios')->on('municipios');

            $t->string('nombre');
            $t->text('resenha');
            $t->timestamps();
            $t->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('institucions');
    }
}
