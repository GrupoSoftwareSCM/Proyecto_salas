<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_sala extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tipos_salas'

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
	public function sala()
	{
		return $this->hasOne('salas','id_tipos_salas');
	}

}
