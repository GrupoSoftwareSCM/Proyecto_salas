<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('funcionarios', function(Blueprint $table)
		{
			$table->increments('id_funcionarios');
			$table->integer('departamento_id')->unsigned();
			$table->foreign('departamento_id')->references('id_departamentos')->on('departamentos')->onDelete('cascade');
            $table->string('rut',13)->unique();
            $table->string('nombres',255);
            $table->string('apellidos',255);
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
		Schema::drop('funcionarios');
	}

}
