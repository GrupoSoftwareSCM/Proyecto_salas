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
        $msn = "asasdda";
        //$Campus = Campus::create($input);
        //$Campus->save();
        /*return view('Administrador.crearAdm',array(
            'mensaje' => 'asdasd',
            'error' => null,
            ));*/

        return redirect('Admin/Campus/create')->with('mensaje', ['mensaje resivido']);
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
