<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rol_usuario extends Model {

	protected $table = 'roles_usuarios'
	protected $fillable = ['rut'];

	/*public function roles()
	{
		return $this->belongsTo('rol','id_roles');
	}*/

}
