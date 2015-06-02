<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultadesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facultades', function(Blueprint $table)
		{
			$table->increments('id_facultades');
            $table->string('nombre',255)->unique();
            $table->integer('campus_id')->unsigned();
            $table->foreign('campus_id')->references('id_campus')->on('campus')->onDelete('cascade');
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
		Schema::drop('facultades');
	}

}
