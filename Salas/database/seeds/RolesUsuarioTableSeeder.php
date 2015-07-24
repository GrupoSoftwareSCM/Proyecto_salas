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

        $admin = Usuario::where('nombres','Oscar Eduardo')->first();
        $encargado = Usuario::where('nombres','Jean Pierre patria')->first();

        $id_admin = Rol::whereNombre('Administrador')->first();
        $id_encargado = Rol::whereNombre('Encargado Campus')->first();
        $id_docente = Rol::whereNombre('Docente')->first();
        $id_estudiante = Rol::whereNombre('Estudiante')->first();

        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $admin->rut,
            'rol_id' => $id_admin->id,
        ));

        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $admin->rut,
            'rol_id' => $id_docente->id,
        ));

        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $encargado->rut,
            'rol_id' => $id_encargado->id,
        ));

        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $encargado->rut,
            'rol_id' => $id_estudiante->id,
        ));


    }
}