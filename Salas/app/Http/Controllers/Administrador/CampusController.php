<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Models\Campus;

//use Illuminate\Http\Request;

class CampusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('Administrador.crearAdm',array(
            'mensaje' => null,
            'error' => null,
        ));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Request::only(['nombre','rut_encargado','direccion','latitud','longitud','descripcion']);
        $msn = $input['nombre'];
        //$Campus = Campus::create($input);
        //$Campus->save();
        return redirect('Admin/Campus/1')->with('mensaje', $msn);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		/*
		 * $id = 1 Crear
		 * $id = 2 MOdificar
		 * $id = 3 eliminar
		 *
		 * */
        if($id == 1){
            return view('Administrador.crearAdm',array(
                'mensaje' => null,
                'error' => null,
            ));
        }
        elseif($id == 2){
            $data_campus = Campus::lists('nombre','id_campus');
            $numero_campus = Campus::all()->count();
            return view('Administrador.modificarAdm', array(
                'numero_campus' => $numero_campus,
                'campus' => $data_campus,
                'id_campus' => null,
                'mensaje' => null,
                'error' => null,
            ));

        }
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return $_SERVER['REQUEST_URI'];
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
