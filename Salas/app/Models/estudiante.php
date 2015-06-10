<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class estudiante extends Model {

	protected $table = 'estudiantes'
	protected $fillable = ['rut','nombres','apellidos','email'];

}
