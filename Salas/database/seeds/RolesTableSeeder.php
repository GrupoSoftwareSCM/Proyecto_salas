<?php
use Illuminate\Database\seeder;
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder {

public function run()
{
	$faker= Faker::create();
    
    for($i = 0; $i < 5; $i ++)
    {

      \DB::table('roles')->insert(array(
       
        'nombre'        =>$faker->unique()->firstName,
        'descripcion'          =>$faker->text
      	));
     }
}
 
}