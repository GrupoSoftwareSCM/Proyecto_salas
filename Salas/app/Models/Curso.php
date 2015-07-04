<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model {

    protected $primaryKey = 'id_cursos';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cursos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['semestre','anio','seccion','docente_id','asignatura_id'];

	/*
	|Para relacionar la tabla padre con la tabla hija usaremos la función:
	|
    |           $this->hasMany('tabla_hija','clave_foranea','clave_local');
	|
	*/
	public function horario()
	{
		return $this->hasMany('App\Models\Horario','id_cursos');
	}

	/*
	|	En este tipo de relaciones se hace uso de una tabla intermedia o pivote para hacer las relaciones y en ambas 
	|	tablas se utiliza una misma función:
	|
    |           $this->belongsToMany('tabla_relacionada','tabla_pivote','clave_primera_tabla','clave_segunda_tabla');
	*/

    public function estudiante()
    {
    	return $this->belongsToMany('App\Models\Estudiante','App\Models\Asignaturas_Cursada','id_cursos','id_estudiante');
    }

	/*
	|	En la tabla hija, de la misma forma que en el caso anterior, usaremos la contraparte de la función que es:
	|
    |            $this->belongsTo('tabla_padre');
    */
	public function asignatura()
	{
		return $this->belongsTo('App\Models\Asignatura');
	}

	public function docente()
	{
		return $this->belongsTo('App\Models\Docente');
	}
}
