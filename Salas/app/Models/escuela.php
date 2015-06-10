<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class escuela extends Model {

	protected $table = 'escuelas'
	protected $fillable = ['nombre','descripcion'];

}
