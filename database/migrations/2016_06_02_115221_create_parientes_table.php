<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parientes', function (Blueprint $t) {
            $t->increments('id_parientes');            

            //Foreign Key parentescos
            $t->integer('id_parentescos')->unsigned();
            $t->foreign('id_parentescos')->references('id_parentescos')->on('parentescos'); 

            $t->string('nombre')->nullable();
            $t->string('telefono')->nullable();   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('parientes');
    }
}
