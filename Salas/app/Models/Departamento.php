<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'departamentos';

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

	public function escuela() //RALACION 1:N
	{
		return $this->hasMany('escuelas','id_departamentos');
	}

	public function docente() //RALACION 1:N
	{
		return $this->hasMany('docentes','id_departamentos');
	}

	public function asignatura() //RALACION 1:N
	{
		return $this->hasMany('asignaturas','id_departamentos');
	}

	public function funcionario() //RALACION 1:N
	{
		return $this->hasMany('funcionarios','id_departamentos');
	}

	
	/*
	|	En la tabla hija, de la misma forma que en el caso anterior, usaremos la contraparte de la función que es:
	|
    |            $this->belongsTo('tabla_padre');
    */
	public function facultad() //RALACION 1:N
	{
		return $this->belongsTo('facultades'); 
	}
}
