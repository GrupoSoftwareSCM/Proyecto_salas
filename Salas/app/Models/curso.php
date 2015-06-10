<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class curso extends Model {

	protected $table = 'cursos'
	protected $fillable = ['semestre','anio','seccion'];

}
