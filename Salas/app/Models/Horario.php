<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model {

    protected $primaryKey = 'id_horarios';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'horarios';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['fecha'];


	/*
	|	En la tabla hija, de la misma forma que en el caso anterior, usaremos la contraparte de la función que es:
	|
    |            $this->belongsTo('tabla_padre');
    */
	public function sala()
	{
		return $this->belongsTo('app\Models\Sala');
	}

	public function periodo()
	{
		return $this->belongsTo('app\Models\Periodo');
	}

	public function curso()
	{
		return $this->belongsTo('app\Models\Curso');
	}

}
