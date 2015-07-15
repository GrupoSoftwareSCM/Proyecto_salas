<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends \UTEM\Dirdoc\Auth\Models\DirdocWSUser
{

    protected $primaryKey = 'rut';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $incrementing = false; // El rut no es autoincrementable .. dah

    protected $fillable = ['rut','email', 'nombres', 'apellidos'];

    public function roles()
    {
        return $this->belongsToMany('Rol', 'usuario_tiene_roles', 'usuario_rut', 'rol_id')->withTimestamps();
    }

}
