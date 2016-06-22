<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandaEstudiantePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banda_estudiante', function (Blueprint $table) {
            
            $table->integer('id_bandas')->unsigned()->index();
            $table->foreign('id_bandas')->references('id_bandas')->on('bandas')->onDelete('cascade');
            $table->integer('id_estudiantes')->unsigned()->index();
            $table->foreign('id_estudiantes')->references('id_estudiantes')->on('estudiantes')->onDelete('cascade');
            $table->primary(['id_bandas', 'id_estudiantes']);
            $table->boolean('asiste')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('banda_estudiante');
    }
}
