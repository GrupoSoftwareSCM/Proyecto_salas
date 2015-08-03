<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Asignatura;
use App\Models\Departamento;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Request;
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
		$asignatura = Asignatura::paginate(10);
        return view('Encargado.modificarAsig',compact('asignatura'));
		//return view('Encargado.ejemploModificarAsig',compact('asignatura'));
	}

    public function create()
	{
		$departamento=Departamento::lists('nombre','id');
		return view('Encargado.agregarAsig',compact('departamento'));
	}
		

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
		$data= Request::only(['nombre','codigo','descripcion','departamento_id']); 
		
		$rules=array(
			'nombre' => 'required|between:3,25|alpha_space',
			'codigo' => 'required|numeric',
			'descripcion'=> 'required|between:3,500',
			'departamento_id' => 'required'
 		);    				

 		$val=Validator::make($data,$rules);	

 		if($val->fails())
 		{
            return redirect()->back()
            ->withErrors($val->errors())
            ->withInput();
 		}								
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
		 $depa = Departamento::lists('nombre','id');
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
	    return redirect('encar/asig/modi');
	}

}
