<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Asignatura;
use App\Models\Departamento;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
class asigController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$asignatura = Asignatura::with('departamento')->paginate();

		return view('Encargado.modifAsig',compact('asignatura'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create()
	{
		$departamento=Departamento::lists('nombre','id_departamentos');
		return view('Encargado.modifAsig')->with('departamento',$departamento);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data= Request::all();         //obtenos los datos y luego es llamado abajo
        $asigna = Asignatura::create($data);
        $asigna->save();
        return redirect()->route('asigController.index');
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
