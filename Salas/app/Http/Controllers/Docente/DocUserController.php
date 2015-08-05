<?php namespace App\Http\Controllers\Docente;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Auth;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;

class DocUserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $user = Auth::user();
		return view('Docente.Body')->with('user',$user);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		//
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
            $datos = Request::only('nombres','apellidos','email');
            $usuario->fill($datos);
            $usuario->save();

            return redirect()->route('Docente.home.index');
        }
        else{
            abort(404);
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
		//
	}

}
