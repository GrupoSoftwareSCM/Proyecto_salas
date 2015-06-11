<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class periodo extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'periodos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['bloque','inicio','fin'];

	/*
	|Para relacionar la tabla padre con la tabla hija usaremos la función:
	|
    |           $this->hasMany('tabla_hija','clave_foranea','clave_local');
	|
	*/
	public function horario()
	{
		return $this->hasMany('horarios','id_periodos');
	}

}
