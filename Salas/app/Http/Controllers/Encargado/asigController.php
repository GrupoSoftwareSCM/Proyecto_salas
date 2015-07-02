<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Asignatura;
use App\Models\Departamento;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class asigController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$asignatura = Asignatura::paginate();

		return view('Encargado.modificarAsig',compact('asignatura'));
	}

    public function create()
	{
		$departamento=Departamento::paginate();
		return view('Encargado.agregarAsig',compact('departamento'));
	}
		/*public function store()
	{
		$data= Request::all();  
		
		//dd($data);	
		//$asigna = Asignatura::create($data);
			
		$asigna = new Asignatura();

		$asigna->nombre = (string)$data['nombre'];
		$asigna->codigo = (string)$data['codigo'];
		$asigna->descripcion = (string)$data['descripcion'];

		$asigna->departamento_id = (string)$data['depa'];

		$asigna->save();
		return redirect('encar/asig/modi');
		
	}*/

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data= Request::only(['nombre','codigo','descripcion','departamento_id']);     																										    //obtenos los datos y luego es llamado abajo
        $asigna = Asignatura::create($data);
        $asigna->save();
        return redirect('encar/asig/modi');
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
		 $asig = Asignatura::findOrFail($id);
		 $depa = Departamento::lists('nombre','id_departamentos');
		return view('Encargado.editarAsig', compact('asig','depa'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$asig = Asignatura::findOrFail($id);
		$asig->fill(Request::all());
		$asig->save();
		
		return redirect('encar/asig/modi');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$asig = Asignatura::find($id);
		$asig->delete();
		Session::flash('message', 'El curso '. $asig->nombre. ' fue eliminado');
	    return redirect('encar/asig/modi');
	}

}
