<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturasCursadasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('asignaturas_cursadas', function(Blueprint $table)
		{
			$table->increments('id_asignaturas_cursadas');
			$table->integer('curso_id')->unsigned();
			$table->foreign('curso_id')->references('id_cursos')->on('cursos')->onDelete('cascade')->unique();
			$table->integer('estudiante_id')->unsigned();
			$table->foreign('estudiante_id')->references('id_estudiantes')->on('estudiantes')->onDelete('cascade')->unique();
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
		Schema::drop('asignaturas_cursadas');
	}

}
