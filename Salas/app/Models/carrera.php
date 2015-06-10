<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class carrera extends Model {

	protected $table = 'carreras'
	protected $fillable = ['codigo','nombre','descripcion'];

}
