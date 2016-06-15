<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudianteParientePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante_pariente', function (Blueprint $t) {
            $t->integer('id_estudiantes')->unsigned()->index();
            $t->foreign('id_estudiantes')->references('id_estudiantes')->on('estudiantes')->onDelete('cascade');
            $t->integer('id_parientes')->unsigned()->index();
            $t->foreign('id_parientes')->references('id_parientes')->on('parientes')->onDelete('cascade');
            $t->primary(['id_estudiantes', 'id_parientes']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('estudiante_pariente');
    }
}
