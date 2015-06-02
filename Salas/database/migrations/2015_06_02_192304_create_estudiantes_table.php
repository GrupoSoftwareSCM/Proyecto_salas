<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estudiantes', function(Blueprint $table)
		{
			$table->increments('id_estudiantes');
			$table->integer('carrera_id')->unsigned();
			$table->foreign('carrera_id')->references('id_carreras')->on('carreras')->onDelete('cascade');
			$table->integer('rut')->unique();
			$table->string('nombres',255);
			$table->string('apellidos',255);
			$table->string('email',255);
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
		Schema::drop('estudiantes');
	}

}