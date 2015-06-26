<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Sala;
use App\Models\Campus;
//use Illuminate\Http\Request;
use Request;



class SalasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$salas = Sala::paginate(); // Cambiar esto, si la db es muy grande queda la escoba
		return view('Encargado.homeEncar',array(
                'Salas' => $salas
            ));
			
	}
  /*
return view('Administrador.CampusCrud.listaCampus', compact('campus'));


$salas = Salas::where('campus_id','=','la id del campus')->paginate();
  */


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
		$salas= Sala::where('campus_id','=',$id)->paginate();
        return view('Encargado.modifSalas',compact('salas'));
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
