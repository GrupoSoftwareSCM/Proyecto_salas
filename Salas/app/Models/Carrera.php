<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model {

    protected $primaryKey = 'id_carreras';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'carreras';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['codigo','nombre','descripcion','escuela_id'];

	/*
	|Para relacionar la tabla padre con la tabla hija usaremos la función:
	|
    |           $this->hasMany('tabla_hija','clave_foranea','clave_local');
	|
	*/
	public function estudiante()
	{
		return $this->hasMany('app\Models\Estudiante','id_carreras');
	}

	/*
	|	En la tabla hija, de la misma forma que en el caso anterior, usaremos la contraparte de la función que es:
	|
    |            $this->belongsTo('tabla_padre');
    */
	public function escuela()
	{
		return $this->belongsTo('app\Models\Escuela');
	}

}
