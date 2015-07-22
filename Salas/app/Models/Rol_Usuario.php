<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol_Usuario extends Model {

    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'roles_usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['usuario_rut','rol_id'];

    public static function id_usuario($id){
        return \DB::table('usuarios')
                    ->select('usuarios.rut')
                    ->join('roles_usuarios','usuarios.rut','=','roles_usuarios.usuario_rut')
                    ->where('usuarios.rut','=',$id)
                    ->get();
    }
}
