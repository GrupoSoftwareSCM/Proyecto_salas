<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Campus;

class Facultad extends Model {

    protected $primaryKey = 'id_facultades';
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
		return $this->hasMany('app\Models\Departamento','id_facultades');
	}

	
	/*
	|	En la tabla hija, de la misma forma que en el caso anterior, usaremos la contraparte de la función que es:
	|
    |            $this->belongsTo('tabla_padre');
    */
	public function campus() //RALACION 1:N
	{
		return $this->belongsTo('app\Models\Campus');
	}


}
