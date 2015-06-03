<?php
use Illuminate\Database\seeder;
use Faker\Factory as Faker;

class EstudiantesTableSeeder extends Seeder {

public function run()
{
	$faker= Faker::create();
    
    for($i = 0; $i < 5; $i ++)
    {

     /* 
			$table->foreign('carrera_id')->references('id_carreras')->on('carreras')->onDelete('cascade');
			$table->integer('rut')->unique();
			$table->string('nombres',255);
			$table->string('apellidos',255);
			$table->string('email',255);*/
	/*\DB::table('estudiantes')->insertGetId(array(
        'rut'           => $faker->ean8,
        'nombres'       => $faker->firstName,
        'apellidos'     => $faker->lastName,
        'email'         => $faker->unique()->email,
        'carrera_id'    =>'1'
		));*/
	/*\DB::table('user_profiles')->insert(array(
		'user_id'       => $id,
		'bio'           => $faker->paragraph(rand(2,5)),
		'website'       => 'http://www.' . $faker->domainName,
        'twitter'       => 'http://www.twitter.com/' .$faker->userName

		));*/
    
        
 

      
     }
}
 
}