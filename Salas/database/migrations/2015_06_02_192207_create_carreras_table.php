<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrerasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carreras', function(Blueprint $table)
		{
			$table->increments('id_carreras');
			$table->integer('escuela_id')->unsigned();
			$table->foreign('escuela_id')->references('id_escuelas')->on('escuelas')->onDelete('cascade');
            $table->integer('codigo')->unique();
            $table->string('nombre',255)->unique();
            $table->text('descripcion');
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
		Schema::drop('carreras');
	}

}
