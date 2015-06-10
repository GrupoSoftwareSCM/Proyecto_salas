<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class docente extends Model {

	protected $table = 'docentes'
	protected $fillable = ['rut','nombre','apellidos'];

}
