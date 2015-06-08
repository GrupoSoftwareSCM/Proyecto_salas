<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EncarUserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('Encargado.homeEncar');
	}
    public function cursos()
    {
    	return view('Encargado.homeEncar');
    }
    public function asig()
    {
    	return view('Encargado.homeEncar');
    }
    public function estu()
    {
    	return view('Encargado.homeEncar');
    }
     public function agrecurso()
    {
    	return view('Encargado.modifCursos');
    }
     public function modicurso()
    {
    	return view('Encargado.modifCursos');
    }
     public function elimcurso()
    {
    	return view('Encargado.modifCursos');
    }
    public function agreasig()
    {
    	return view('Encargado.modifAsig');
    }
    public function modiasig()
    {
    	return view('Encargado.modifAsig');
    }
    public function elimasig()
    {
    	return view('Encargado.modifAsig');
    }
    public function agreestu()
    {
    	return view('Encargado.modifEstu');
    }
    public function modiestu()
    {
    	return view('Encargado.modifEstu');
    }
    public function elimestu()
    {
    	return view('Encargado.modifEstu');
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
