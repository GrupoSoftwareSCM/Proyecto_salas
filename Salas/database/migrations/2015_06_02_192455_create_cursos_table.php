<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cursos', function(Blueprint $table)
		{
			$table->increments('id_cursos');
			$table->integer('asignatura_id')->unsigned();
			$table->foreign('asignatura_id')->references('id_asignaturas')->on('asignaturas')->onDelete('cascade')->unique();
           	$table->integer('docente_id')->unsigned();
           	$table->foreign('docente_id')->references('id_docentes')->on('docentes')->onDelete('cascade')->unique();
           	$table->integer('semestre')->unique();
           	$table->integer('anio')->unique();
           	$table->integer('seccion')->unique();
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
		Schema::drop('cursos');
	}

}
