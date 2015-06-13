<?php
use Illuminate\Database\seeder;


class CampusTableSeeder extends Seeder {

	public function run()
	{
		$Campus = array(
			'nombre' 	  => 'Macul',
			'direccion'   => 'Av. José Pedro Alessandri 1242, Ñuñoa',
			'latitud' 	  => -33.466193,
			'longitud' 	  => -70.597085,
			'descripcion' => 'En el Campus Macul se encuentra  la Facultad de Ciéncias Naturales,		                   Matemática y del Medio Ambiente y la Facultad de Ingeniería.',
			'rut_encargado' => 123,
			);
		\DB::table('campus')->insert(array(
			'nombre' 	  => $Campus['nombre'],
			'direccion'   => $Campus['direccion'],
			'latitud' 	  => $Campus['latitud'],
			'longitud' 	  => $Campus['longitud'],
			'descripcion' => $Campus['descripcion'],
			'rut_encargado' => $Campus['rut_encargado'],
      	));
	}
 
}