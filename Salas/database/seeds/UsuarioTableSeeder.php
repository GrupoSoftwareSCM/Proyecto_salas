<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 16-07-15
 * Time: 02:32 PM
 */

use Illuminate\Database\Seeder;


class UsuarioTableSeeder extends  DatabaseSeeder{

    public function run(){
        \DB::table('usuarios')->delete();

        $nombres = ['Oscar Eduardo', 'Jean Pierre patria'];
        $apellidos = ['Muñoz Bernales', 'Cid bustos'];
        $email = ['munoz.bernales.oscar@gmail.com',''];
        $rut = ['17.860.032-k','18.028.419-2'];


        for($i=0;$i<2;$i++){
            \DB::table('usuarios')->insert(array(
                'rut' => $rut[$i],
                'email' => $email[$i],
                'nombres' => $nombres[$i],
                'apellidos' => $apellidos[$i],
            ));
        }


    }

}