<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class facultad extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'fecultades';

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

	public function departamento() //RALACION 1:N
	{
		return $this->hasMany('departamentos','id_facultades');
	}

	
	/*
	|	En la tabla hija, de la misma forma que en el caso anterior, usaremos la contraparte de la función que es:
	|
    |            $this->belongsTo('tabla_padre');
    */
	public function campus() //RALACION 1:N
	{
		return $this->belongsTo('campus'); 
	}

}
