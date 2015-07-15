<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 15-07-15
 * Time: 05:53 PM
 */

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolesTableSeeder {


    public function run()
    {
        \DB::table('roles')->delete();
        $nombres = ['Administrador', 'Encargado Campus', 'Estudiante', 'Docente'];

        foreach($nombres as $nombre)
        {
            $rol = Rol::create(['nombre' => $nombre]);
        }
    }


}