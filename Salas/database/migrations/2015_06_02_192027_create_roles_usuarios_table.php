<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roles_usuarios', function(Blueprint $table)
		{
			$table->increments('id_roles_usuarios');
			$table->integer('rut');->unique();
			$table->integer('rol_id')->unsigned();
			$table->foreign('rol_id')->references('id_roles')->on('roles')->onDelete('cascade')->unique();
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
		Schema::drop('roles_usuarios');
	}

}
