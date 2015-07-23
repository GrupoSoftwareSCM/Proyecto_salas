<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Campus;

class Facultad extends Model {

    protected $primaryKey = 'id';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'facultades';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nombre','descripcion','campus_id'];


	/*
	|Para relacionar la tabla padre con la tabla hija usaremos la función:
	|
    |           $this->hasMany('tabla_hija','clave_foranea','clave_local');
	|
	*/

	public function departamento() //RALACION 1:N
	{
		return $this->hasMany('App\Models\Departamento','id');
	}

	
	/*
	|	En la tabla hija, de la misma forma que en el caso anterior, usaremos la contraparte de la función que es:
	|
    |            $this->belongsTo('tabla_padre');
    */
	public function campus() //RALACION 1:N
	{
		return $this->belongsTo('App\Models\Campus','campus_id','id');
	}


}
