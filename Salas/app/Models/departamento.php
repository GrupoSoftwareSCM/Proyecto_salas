<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model {

	protected $table = 'departamentos'
	protected $fillable = ['nombre','descripcion'];

}
