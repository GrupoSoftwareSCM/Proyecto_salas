<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('horarios', function(Blueprint $table)
		{
			$table->increments('id_horarios');
			$table->date('fecha')->unique(); //faltas colocarle DEFAULT NOW();
			$table->integer('sala_id')->unsigned();
			$table->foreign('sala_id')->references('id_salas')->on('salas')->onDelete('cascade')->unique();
			$table->integer('periodo_id')->unsigned();
			$table->foreign('periodo_id')->references('id_periodos')->on('periodos')->onDelete('cascade')->unique();
            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id_cursos')->on('cursos')->onDelete('cascade');
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
		Schema::drop('horarios');
	}

}
