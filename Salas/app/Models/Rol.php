<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model {

    protected $primaryKey = 'id_roles';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $fillable = ['nombre','descripcion'];

    /*
	|Para relacionar la tabla padre con la tabla hija usaremos la función:
	|
    |           $this->hasMany('tabla_hija','clave_foranea','clave_local');
	|
	*/
    public function roles_usuarios()
    {
        return $this->hasMany('app\Models\rol_Usuario','id_roles');
    }


}
