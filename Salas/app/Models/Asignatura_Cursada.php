<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura_Cursada extends Model {
    protected $primaryKey = 'id_asignaturas_cursadas';

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'asignaturas_cursadas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['carrera_id','curso_id'];





}
