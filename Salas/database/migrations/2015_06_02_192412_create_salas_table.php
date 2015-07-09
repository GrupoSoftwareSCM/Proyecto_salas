<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('salas', function(Blueprint $table)
		{
			$table->increments('id_salas');
			$table->integer('campus_id')->unsigned();
			$table->foreign('campus_id')->references('id_campus')->on('campus')->onDelete('cascade');
			$table->integer('tipo_sala_id')->unsigned();
			$table->foreign('tipo_sala_id')->references('id_tipos_salas')->on('tipos_salas')->onDelete('cascade')->unique();
			$table->string('nombre',255)->unique();
			$table->integer('capacidad');
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
		Schema::drop('salas');
	}

}
