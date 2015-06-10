<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_sala extends Model {

	protected $table = 'tipos_salas'
	protected $fillable = ['nombre','descripcion'];

}
