<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use DB;

use App\Models\Usuario;

//use Illuminate\Http\Request;

class AdmUserController extends Controller {


    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function index()
    {
		return view('Administrador.homeAdm');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
    public function create()
    {
        return view('Administrador.homeAdm');
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
        return view('Administrador.homeAdm');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return view('Administrador.homeAdm');
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

            return redirect()->route('Admin.home.index');

            /*$datos_edit_campus = Request::only(['nombre','direccion','latitud','longitud','descripcion','rut_encargado']);
            $Campus->fill($datos_edit_campus);
            $Campus->save();*/
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
        return view('Administrador.homeAdm');
	}

}
