<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sala extends Model {

	protected $table = 'salas'
	protected $fillable = ['nombre','descripcion'];

}
