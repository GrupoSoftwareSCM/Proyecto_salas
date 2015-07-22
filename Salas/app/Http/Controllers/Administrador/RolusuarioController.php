<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Models\Rol_Usuario;
use App\Models\Rol;
use App\Models\Usuario;

//use Illuminate\Http\Request;

class RolusuarioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data = Usuario::join_usuario_rol();
        return view('Administrador.bodyAdm')->with('Roluser',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $data = Rol::lists('nombre','id');
        return view('Administrador.crearAdm')->with('rol',$data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$data_usuario = Request::only(['rut','nombres','apellidos','email']);

        //dd(Usuario::paginate()->last());
        Usuario::create($data_usuario);
        $query = Usuario::paginate()->last();

        $roluser = new Rol_Usuario();

        $roluser->usuario_rut = $query->rut;
        $roluser->rol_id = Request::input('rol_id');

        $roluser->save();



        return redirect()->route('Admin.Roluser.index');
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
        $rol = Rol_Usuario::find($id);
        if($rol){
            $data = Rol::lists('nombre','id');
            $rol_id = Rol::find($rol->rol_id);
            $usuario = Usuario::find($rol->usuario_rut);
            //dd($usuario);
            return view('Administrador.editarAdm')->with('roles_usuario',$rol)->with('rol',$data)->with('rol_id',$rol_id)->with('usuario',$usuario);
        }
        else{
            abort(404,'id no encontrado');
        }

        //dd(Rol::find($rol->rol_id));
        //dd(Usuario::find($rol->usuario_rut));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//EL ID QUE RESIVE ES DEL ROL_USUARIO
        $rol_user = Rol_Usuario::find($id);
        if($rol_user){
            $data = Request::only(['rol_id']);
            $rol_user->fill($data);
            $rol_user->save();
            return redirect()->route('Admin.Roluser.index')->with('mensaje', 'Rol editado con exito');

        }
        else{
            abort(404,'id no encontrado');
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
		$roluser = Rol_Usuario::find($id);
        if($roluser){
            $rut = Rol_Usuario::id_usuario($roluser->usuario_rut);
            $user = Usuario::find($rut[0]->rut);


            $roluser->delete();
            $user->delete();
            return redirect()->route('Admin.Roluser.index')->with('mensaje','Usuario Eliminado');
        }
        else{
            return redirect()->route('Admin.Roluser.index')->with('mensaje','Usuario No encontrado');
        }
	}

}
