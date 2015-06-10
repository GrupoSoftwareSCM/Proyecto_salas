<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class asignatura extends Model {

	protected $table = 'asignaturas'
	protected $fillable = ['codigo','nombre','descripcion'];

}
