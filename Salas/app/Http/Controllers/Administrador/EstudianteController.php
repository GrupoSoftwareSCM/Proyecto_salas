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
        return view('Administrador.Estudiante.Body')->with('Estudiantes',$estudiante);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $carrera = Carrera::lists('nombre','id');
		return view('Administrador.Estudiante.Crear')->with('Carreras', $carrera);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\EstudianteRequest $request)
	{
		$data = $request->only(['nombres','apellidos','rut','email']);
        $estudiante = $request->only(['nombres','apellidos','rut','email','carrera']);
        $id_estudiante = Rol::whereNombre('ESTUDIANTE')->first()->id;

        if(count(Usuario::where('rut',$data['rut'])->first()) == 0)
            Usuario::create($data);

        elseif(count(Usuario::where('rut',$data['rut'])->first()->roles()->whereNombre('ESTUDIANTE')->first())== 0){
            Rol_Usuario::create([
                'usuario_rut' => $data['rut'],
                'rol_id' => $id_estudiante
            ]);
        }
        elseif(count(Estudiante::where('rut',$estudiante['rut'])->first())== 0){
            Estudiante::create([
                'nombres' => $estudiante['nombres'],
                'apellidos' => $estudiante['apellidos'],
                'rut' => (integer)$estudiante['rut'],
                'email' => $estudiante['email'],
                'carrera_id' => (integer)$estudiante['carrera']
            ]);
        }
        else{
            Session::flash('message', 'Usuario actualmente creado');
            return redirect()->route('Admin.Estudiante.index');
        }
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
        $estudiante = Estudiante::find($id);
        if($estudiante){
            $carrera = Carrera::lists('nombre','id');
            return view('Administrador.Estudiante.Editar')->with('estudiante',$estudiante)->with('Carreras', $carrera);
        }
        else{
            abort(404,'Estudiante no encontrado');
        }

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $estudiante = Estudiante::find($id);
        if($estudiante){
            //NO VOY A TOCAR EL RUT
            $datos = Request::only(['nombres','apellidos','email','carrera']);
            $estudiante->fill([
                'nombres' => $datos['nombres'],
                'apellidos' => $datos['apellidos'],
                'email' => $datos['email'],
                'carrera_id' => $datos['carrera'],
            ]);
            $estudiante->save();
            Session::flash('message', 'Usuario Editado correctamente');
            return redirect()->route('Admin.Estudiante.index');
        }
        else{
            abort(404,'Estudiante no encontrado');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$estudiante = Estudiante::find($id);
        $usuario = Usuario::find($estudiante->rut);
        $usuario->delete();
        $estudiante->delete();
        Session::flash('message', 'Usuario Eliminado correctamente');
        return redirect()->route('Admin.Estudiante.index');
	}

}
