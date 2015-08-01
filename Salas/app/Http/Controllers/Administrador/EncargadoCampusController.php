<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Rol_Usuario;
use App\Models\Rol;
use App\Models\Usuario;
use Request;


use Illuminate\Support\Facades\Session;

class EncargadoCampusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Rol::whereNombre('ENCARGADO_CAMPUS')->first();
        return view('Administrador.EncargadoCampus.Body')->with('Encargados',$data->usuarios);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('Administrador.EncargadoCampus.Crear');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\EncargadoCampusRequest $request)
	{
        $data = $request->only(['nombres','apellidos','rut','email']);
        $id_encargado = Rol::whereNombre('ENCARGADO_CAMPUS')->first()->id;
        $rut_usuario = Usuario::where('rut',$data['rut'])->first()->rut;

        if(count(Usuario::where('rut',$data['rut'])->first()) == 0)
            Usuario::create($data);

        if(count(Usuario::where('rut',$data['rut'])->first()->roles()->whereNombre('ENCARGADO_CAMPUS')->first())== 0){
            Rol_Usuario::create([
                'rol_id' => $id_encargado,
                'usuario_rut' => $rut_usuario
            ]);
        }
        else{
            \Session::flash('alert', 'RUT :'.$data['rut'].' ya esta asignado a un CAMPUS');
            return redirect()->route('Admin.EncargadoCampus.create');
        }

        \Session::flash('message', 'Usuario Creado correctamente');
        return redirect()->route('Admin.EncargadoCampus.index');
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
        $usuario = Usuario::find($id);
        if($usuario){
            return view('Administrador.EncargadoCampus.Editar')->with('users',$usuario);
        }
        else{
            abort(404,'no se encuentra el id');
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
        $usuario = Usuario::find($id);
        if($usuario){
            $usuario->fill(Request::only(['nombres','apellidos','email']));
            $usuario->save();
            \Session::flash('message', 'Usuario Editado correctamente');
            return redirect()->route('Admin.EncargadoCampus.index');
        }
        else{
            abort(404,'no se encuentra el id');
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
        $usuario = Usuario::find($id);
        if($usuario){
            $usuario->delete();
            \Session::flash('destroy', 'Usuario Eliminado correctamente');
            return redirect()->route('Admin.EncargadoCampus.index');
        }
        else{
            abort(404,'rut no encontrado');
        }
	}

}
