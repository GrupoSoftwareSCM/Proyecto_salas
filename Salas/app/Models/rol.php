<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rol extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $fillable = ['nombre','descripcion'];


    
    /*public function roles_usuarios()
    {
    	return $this->hasMany('rol_usuario');
    }*/

}
