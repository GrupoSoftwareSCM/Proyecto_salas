<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model {

    protected $primaryKey = 'id';
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

    public function usuarios()
    {
        return $this->belongsToMany('\App\Models\Usuarios', 'roles_usuarios', 'rol_id', 'usuario_rut');
    }


}
