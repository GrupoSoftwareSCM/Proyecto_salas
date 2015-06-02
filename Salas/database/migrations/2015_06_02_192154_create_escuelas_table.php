<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscuelasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('escuelas', function(Blueprint $table)
		{
			$table->increments('id_escuelas');
			$table->string('nombre',255)->unique();
			$table->integer('departamento_id')->unsigned();
			$table->foreign('departamento_id')->references('id_departamentos')->on('departamentos')->onDelete('cascade')->unique();
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
		Schema::drop('escuelas');
	}

}
