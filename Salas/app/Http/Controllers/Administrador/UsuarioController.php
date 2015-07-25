<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Usuario;

use Request;
//use Illuminate\Http\Request;

class UsuarioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $user = Usuario::paginate();
		return view('Administrador.bodyAdm')->with('user',$user);
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
	public function store(Requests\UsuarioRequest $request)
	{
        $data = $request->only('nombres','apellidos','rut');
        Usuario::create($data);

        return redirect()->route('Admin.User.index');

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
		$user = Usuario::find($id);
        return view('Administrador.editarAdm')->with('user', $user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = Usuario::find($id);
        if($user){
            $data = Request::only(['nombres','apellidos','rut']);
            $user->fill($data);
            $user->save();
            return redirect()->route('Admin.User.index');
        }
        else{
            return "no eres nada";
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
		$user = Usuario::find($id);
        if($user){
            $user->delete();
            return redirect()->route('Admin.User.index');
        }
	}

}
