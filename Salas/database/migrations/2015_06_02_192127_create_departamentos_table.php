<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamentosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('departamentos', function(Blueprint $table)
		{
			$table->increments('id_departamentos');
			$table->string('nombre',255)->unique();
			$table->integer('facultad_id')->unsigned();
			$table->foreign('facultad_id')->references('id_facultades')->on('facultades')->onDelete('cascade')->unique();
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
		Schema::drop('departamentos');
	}

}
