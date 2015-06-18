<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model {

    protected $primaryKey = 'id_salas';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'salas';

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
	public function horario()
	{
		return $this->hasOne('app\Models\Horario','id_salas');
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

	public function tipo_sala() //RALACION 1:N
	{
		return $this->belongsTo('app\Models\Tipos_Salas');
	}

}
