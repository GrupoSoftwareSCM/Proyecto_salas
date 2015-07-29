<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Rol_Usuario;
use App\Models\Rol;
use App\Models\Usuario;
use Request;
use Illuminate\Support\Facades\Session;

class AdministradorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data = Rol::whereNombre('ADMINISTRADOR')->first();
        //dd($data->usuarios);
        return view('Administrador.bodyAdm')->with('Adminis',$data->usuarios);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('Administrador.crearAdm');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\AdministradorRequest $request)
	{
		$data = $request->only(['nombres','apellidos','rut','email']);
        $id_administrador = Rol::whereNombre('ADMINISTRADOR')->first()->id;
        Usuario::create($data);
        $rut_usuario = Usuario::where('nombres',$data['nombres'])->first()->rut;
        Rol_Usuario::create([
            'rol_id' => $id_administrador,
            'usuario_rut' => $rut_usuario
        ]);

        Session::flash('message', 'Usuario Creado correctamente');
        return redirect()->route('Admin.Administrador.index');
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
            return view('Administrador.editarAdm')->with('users',$usuario);
        }
        else{
            abort(404,'usuario no encontrado');
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
            Session::flash('message', 'Usuario Editado correctamente');
            return redirect()->route('Admin.Administrador.index');
        }
        else{
            abort(404,'usuario no encontrado');
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
            Session::flash('message', 'Usuario Eliminado correctamente');
            return redirect()->route('Admin.Administrador.index');
        }
        else{
            abort(404,'rut no encontrado');
        }
	}

}
