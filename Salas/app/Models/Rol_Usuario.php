<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol_Usuario extends Model {

    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'roles_usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['rut','rol_id'];

	/*
	|	En la tabla hija, de la misma forma que en el caso anterior, usaremos la contraparte de la función que es:
	|
    |            $this->belongsTo('tabla_padre');
    */
	public function rol()
    {
        return $this->belongsTo('app\Models\Rol');
    }

}
