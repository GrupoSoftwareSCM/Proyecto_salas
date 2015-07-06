<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Facultad;
use App\Models\Departamento;
use Request;

//use Illuminate\Http\Request;

class DepartamentoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data_depto = Departamento::paginate();
        return view('Administrador.bodyAdm')->with('Departamentos', $data_depto);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $data_Facultad = Facultad::lists('nombre','id_facultades');
        return view('Administrador.crearAdm')->with('Facultad',$data_Facultad);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $datos_nuevo_depto = Request::only(['nombre','descripcion','facultad_id']);
        Departamento::create($datos_nuevo_depto);

        return redirect()->route('Admin.Depto.index');
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
        $Departamento = Facultad::find($id);
        $Facultad = Facultad::lists('nombre','id_facultades');
        return view('Administrador.editarAdm')->with('Departamento',$Departamento)->with('Facultad',$Facultad);
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
