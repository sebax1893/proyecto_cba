<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandaInstitucionPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banda_institucion', function (Blueprint $table) {
            $table->integer('id_bandas')->unsigned()->index();
            $table->foreign('id_bandas')->references('id_bandas')->on('bandas')->onDelete('cascade');
            $table->integer('id_institucions')->unsigned()->index();
            $table->foreign('id_institucions')->references('id_institucions')->on('institucions')->onDelete('cascade');
            $table->primary(['id_bandas', 'id_institucions']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('banda_institucion');
    }
}
