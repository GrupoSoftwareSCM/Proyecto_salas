<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class campus extends Model {

	protected $table = 'campus'
	protected $fillable = ['nombre','direccion','latitud','longitud','descripcion','rut_encargado'];

}
