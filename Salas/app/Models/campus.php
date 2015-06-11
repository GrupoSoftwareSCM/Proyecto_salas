<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class campus extends Model {

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
		return $this->hasMany('facultades','id_campus');
	}

	public function sala() //RELACION 1:N
	{
		return $this->hasMany('salas','id_campus');
	}
}
