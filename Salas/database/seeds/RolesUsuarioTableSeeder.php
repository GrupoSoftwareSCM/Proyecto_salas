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
        $encargado = Usuario::where('nombres','Jean Pierre patric')->first();
        $profesor = Usuario::where('nombres','Sebastian')->first();

        $id_admin = Rol::whereNombre('ADMINISTRADOR')->first();
        $id_encargado = Rol::whereNombre('ENCARGADO_CAMPUS')->first();
        $id_docente = Rol::whereNombre('ESTUDIANTE')->first();
        $id_estudiante = Rol::whereNombre('DOCENTE')->first();


        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $profesor->rut,
            'rol_id' => $id_admin->id,
        ));

        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $profesor->rut,
            'rol_id' => $id_encargado->id,
        ));


        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $profesor->rut,
            'rol_id' => $id_docente->id,
        ));

        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $profesor->rut,
            'rol_id' => $id_estudiante->id,
        ));




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