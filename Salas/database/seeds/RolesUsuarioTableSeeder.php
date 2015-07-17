<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 17-07-15
 * Time: 11:37 AM
 */

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Rol;

class RolesUsuarioTableSeeder extends DatabaseSeeder{

    public function run(){
        \DB::table('roles_usuarios')->delete();

        //ASIGNAMOS LOS ROLES  A LOS USUARIOS

        $admin = Usuario::where('nombres','Oscar Eduardo')->get();
        $encargado = Usuario::where('nombres','Jean Pierre patria')->get();

        $id_admin = Rol::where('nombre','Administrador')->get();
        $id_encargado = Rol::where('nombre','Encargado Campus')->get();

        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $admin[0]->rut,
            'rol_id' => $id_admin[0]->id,
        ));

        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $encargado[0]->rut,
            'rol_id' => $id_encargado[0]->id,
        ));
    }
}