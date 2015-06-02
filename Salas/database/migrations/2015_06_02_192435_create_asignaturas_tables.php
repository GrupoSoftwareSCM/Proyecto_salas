<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturasTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('asignaturas', function(Blueprint $table)
		{
			$table->increments('id_asignaturas');
			$table->integer('departamento_id')->unsigned();
			$table->foreign('departamento_id')->references('id_departamentos')->on('departamentos')->onDelete('cascade');
            $table->string('codigo',255)->unique();
            $table->string('nombre',255);
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
		Schema::drop('asignaturas');
	}

}
