<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campus', function(Blueprint $table)
		{
			$table->increments('id_campus');
			$table->string('nombre',255)->unique();
			$table->string('direccion',255);
			$table->double('latitud');->unique();
			$table->double('longitud');->unique();
			$table->text('descripcion');
			$table->integer('rut_encargado');
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
		Schema::drop('campus');
	}

}
