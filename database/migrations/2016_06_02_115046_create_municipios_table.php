<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $t) {
            $t->increments('id_municipios');

            //Foreign Key subregions
            $t->integer('id_subregions')->unsigned();
            $t->foreign('id_subregions')->references('id_subregions')->on('subregions');   

            $t->string('nombre');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('municipios');
    }
}
