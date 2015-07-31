<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Rol_Usuario;
use App\Models\Estudiante;
use App\Models\Carrera;
use Illuminate\Support\Facades\Session;
use Request;

class EstudianteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $estudiante = Estudiante::paginate();
        //dd($estudiante);
        return view('Administrador.bodyAdm')->with('Estudiantes',$estudiante);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $carrera = Carrera::lists('nombre','id');
		return view('Administrador.crearAdm')->with('Carreras', $carrera);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\EstudianteRequest $request)
	{
		$data = $request->only(['nombres','apellidos','rut','email']);
        Usuario::create($data);

        $estudiante = $request->only(['nombres','apellidos','rut','email','carrera']);
        Estudiante::create([
            'nombres' => $estudiante['nombres'],
            'apellidos' => $estudiante['apellidos'],
            'rut' => (integer)$estudiante['rut'],
            'email' => $estudiante['email'],
            'carrera_id' => (integer)$estudiante['carrera']
        ]);

        $id_estudiante = Rol::whereNombre('ESTUDIANTE')->first()->id;
        Rol_Usuario::create([
            'usuario_rut' => $data['rut'],
            'rol_id' => $id_estudiante
        ]);

        Session::flash('message', 'Usuario Creado correctamente');
        return redirect()->route('Admin.Estudiante.index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}