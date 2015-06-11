<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class funcionario extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'funcionarios';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['rut','nombres','apellidos'];

	/*
	|	En la tabla hija, de la misma forma que en el caso anterior, usaremos la contraparte de la función que es:
	|
    |            $this->belongsTo('tabla_padre');
    */
	public function departamento()
	{
		return $this->belongsTo('departamentos');
	}

}
