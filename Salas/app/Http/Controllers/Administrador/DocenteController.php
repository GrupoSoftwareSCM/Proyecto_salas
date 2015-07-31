<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Rol;
use App\Models\Rol_Usuario;
use App\Models\Docente;
use App\Models\Departamento;
use App\Models\Usuario;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class DocenteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $docente = Docente::paginate();
		return view('Administrador.bodyAdm')->with('Docentes',$docente);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $departamento = Departamento::lists('nombre','id');
        return view('Administrador.crearAdm')->with('depto',$departamento);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\DocenteRequest $request)
	{
        $data = $request->only('nombres','apellidos','email','departamentos','rut');
        $id_departamento = Departamento::where('id',$request->only(['departamentos']))->first()->id;
        //dd($data);
        Usuario::create([
            'rut' => (integer)$data['rut'],
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'email' => $data['email'],
        ]);
        Rol_Usuario::create([
            'rol_id' => $id_departamento,
            'usuario_rut' => (integer)$data['rut'],
        ]);

        Docente::create([
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'email' => $data['email'],
            'rut' => (integer)$data['rut'],
            'departamento_id' => (integer)$data['departamentos']
        ]);
        Session::flash('message', 'Usuario Creado correctamente');
        return redirect()->route('Admin.Docente.index');
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
		$docente = Docente::find($id);
        if($docente){
                //
        }
        else{
            abort(404,'id no encontrado');
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
