<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Models\Estudiante;
use App\Models\Carrera;
//use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class estuController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$estu = Estudiante::paginate();
  		return view('Encargado.modificarEstu',compact('estu'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$carreras= Carrera::paginate();		
		return view('Encargado.agregarEstu',compact('carreras'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data= Request::only(['nombres','apellidos','rut','email','carrera_id']);   
		$rules=array(
			'nombres' => 'required',
			'apellidos' => 'required',
			'rut'=> 'required',
			'email'=> 'required'
			
 		);    				

 		$val=Validator::make($data,$rules);	

 		if($val->fails())
 		{
            return redirect()->back()
            ->withErrors($val->errors())
            ->withInput();
 		}		  																										    //obtenos los datos y luego es llamado abajo
        $estu = Estudiante::create($data);
        $estu->save();
        return redirect('encar/estu/modi');
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
		$estu=Estudiante::findOrFail($id);
		$carre=Carrera::lists('nombre','id');
		return view('Encargado.editarEstu', compact('estu','carre'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$estu= Estudiante::findOrFail($id);
		$estu->fill(Request::all());
		$estu->save();
		return redirect('encar/estu/modi');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$estu= Estudiante::findOrFail($id);
		$estu->delete();
		return redirect('encar/estu/modi');
	}

}
