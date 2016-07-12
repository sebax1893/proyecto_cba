<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bandas', function (Blueprint $t) {
            $t->increments('id_bandas');

            //Foreign Key Institución
            $t->integer('id_institucions')->unsigned();
            $t->foreign('id_institucions')->references('id_institucions')->on('institucions')->onDelete('cascade');

            //Foreign Key Categorias
            $t->integer('id_categorias')->unsigned();
            $t->foreign('id_categorias')->references('id_categorias')->on('categorias')->onDelete('cascade');   

            //Foreign Key tipo_bandas
            $t->integer('id_tipo_bandas')->unsigned();
            $t->foreign('id_tipo_bandas')->references('id_tipo_bandas')->on('tipo_bandas')->onDelete('cascade');   

            $t->string('nombre');
            $t->string('representante');
            $t->string('contacto_representante');
            $t->string('correo_representante');
            $t->string('director');
            $t->string('contacto_director');
            $t->string('correo_director');
            $t->text('resenha');            

            $t->timestamps();          
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bandas');
    }
}
