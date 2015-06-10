<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class periodo extends Model {

	protected $table = 'periodos'
	protected $fillable = ['bloque','inicio','fin'];

}
