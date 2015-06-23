<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Monolog\Handler\NullHandlerTest;

class Campus extends Model {

	protected $primaryKey = 'id_campus';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'campus';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nombre','direccion','latitud','longitud','descripcion','rut_encargado'];

	/*
	|Para relacionar la tabla padre con la tabla hija usaremos la función:
	|
    |           $this->hasMany('tabla_hija','clave_foranea','clave_local');
	|
	*/

	public function facultad() //RELACION 1:N
	{
		return $this->hasMany('app\Models\Facultad','id_campus');
	}

	public function sala() //RELACION 1:N
	{
		return $this->hasMany('app\Models\Sala','id_campus');
	}

    public function id_campus($nombre = null)
    {
        $query = Campus::id_campus();
        return $query['id_campus'];
    }
}
