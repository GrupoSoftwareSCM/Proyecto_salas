<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model {

    protected $primaryKey = 'id_asignaturas';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'asignaturas';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['codigo','nombre','descripcion','departamento_id'];

	/*
	|Para relacionar la tabla padre con la tabla hija usaremos la función:
	|
    |           $this->hasMany('tabla_hija','clave_foranea','clave_local');
	|
	*/
	public function curso()
	{
		return $this->hasMany('App\Models\Curso','id_asignaturas');
	}

	/*
	|	En la tabla hija, de la misma forma que en el caso anterior, usaremos la contraparte de la función que es:
	|
    |            $this->belongsTo('tabla_padre');
    */
	public function departamento()
	{
		return $this->belongsTo('App\Models\Departamento');
	}

}
