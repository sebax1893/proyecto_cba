<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $t) {
            $t->increments('id_estudiantes');

            //Foreign Key tipo_documentos
            $t->integer('id_tipo_documentos')->unsigned();
            $t->foreign('id_tipo_documentos')->references('id_tipo_documentos')->on('tipo_documentos');

            //Foreign Key eps
            $t->integer('id_eps')->unsigned();
            $t->foreign('id_eps')->references('id_eps')->on('eps');

            //Foreign Key municipios
            $t->integer('id_municipios')->unsigned();
            $t->foreign('id_municipios')->references('id_municipios')->on('municipios');

            //Foreign Key bandas
            $t->integer('id_bandas')->unsigned();
            $t->foreign('id_bandas')->references('id_bandas')->on('bandas');        

            $t->integer('numeroIdentificacion');
            $t->string('nombres');
            $t->string('apellidos');
            $t->integer('edad');
            $t->date('fechaNacimiento');
            $t->string('direccion');            
            $t->string('barrio');
            $t->string('telefono');
            $t->string('celular')->nullable();
            $t->string('correo');
            $t->text('observaciones');
            $t->binary('foto')->nullable();           
            $t->boolean('activo')->default(1);
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
        Schema::drop('estudiantes');
    }
}
