<?php namespace App\Models;

use App\Providers\rut;
use Illuminate\Database\Eloquent\Model;

class Usuario extends \UTEM\Dirdoc\Auth\Models\DirdocWSUser
{
    protected $primaryKey = 'rut';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['rut','email', 'nombres', 'apellidos'];

    public function roles()
    {
        return $this->belongsToMany('\App\Models\Rol', 'roles_usuarios', 'usuario_rut', 'rol_id');
    }

    public static function join_usuario_rol(){
        return \DB::table('usuarios')->join('roles_usuarios','usuarios.rut','=','roles_usuarios.usuario_rut')
                                        ->join('roles','roles_usuarios.rol_id','=','roles.id')->get();

    }



}
