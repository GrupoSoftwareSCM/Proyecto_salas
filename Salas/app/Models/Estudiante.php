<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model {

    protected $primaryKey = 'id_estudiantes';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'estudiantes';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['rut','nombres','apellidos','email','carrera_id'];

	/*
	|	En este tipo de relaciones se hace uso de una tabla intermedia o pivote para hacer las relaciones y en ambas 
	|	tablas se utiliza una misma función:
	|
    |           $this->belongsToMany('tabla_relacionada','tabla_pivote','clave_primera_tabla','clave_segunda_tabla');
	*/

    public function curso()
    {
    	return $this->belongsToMany('App\Models\Cursos','app\Models\Asignatura_Cursada','id_estudiantes','id_cursos');
    }
	/*
	|	En la tabla hija, de la misma forma que en el caso anterior, usaremos la contraparte de la función que es:
	|
    |            $this->belongsTo('tabla_padre');
    */
	public function carrera() //RALACION 1:N
	{
		return $this->belongsTo('App\Models\Carrera');
	}



}
