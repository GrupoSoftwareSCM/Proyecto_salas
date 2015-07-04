<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Asignatura;
use App\Models\Curso;
use Illuminate\Http\RedirectResponse;
use Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class cursController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cursos=Curso::with('docente','asignatura')->paginate();
		return view('Encargado.modificarCurso', compact('cursos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$asignaturas=Asignatura::lists('nombre','id_asignaturas');
	    $docentes=Docente::lists('nombres','id_docentes');
		return view('Encargado.agregarCurs')
		->with('asignaturas', $asignaturas)
		->with('docentes', $docentes);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data= Request::only('asignatura_id','docente_id','semestre','anio','seccion');
         // dd($data);  
         $rules=array(
			'semestre' => 'required',
			'anio' => 'required',
			'seccion'=> 'required',
			
 		);    				

 		$val=Validator::make($data,$rules);	

 		if($val->fails())
 		{
            return redirect()->back()
            ->withErrors($val->errors())
            ->withInput();
 		}				 
         $cursos=Curso::create($data);
         $cursos->save();

       	 return redirect('encar/curs/modi');
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
	    $cursos=Curso::findOrFail($id);
		$asignaturas=Asignatura::lists('nombre','id_asignaturas');
		$docentes=Docente::lists('nombres','id_docentes');

       return view('Encargado.editarCurs', compact('cursos','asignaturas','docentes'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$cursos=Curso::findOrFail($id);
		$cursos->fill(Request::all());
	    $cursos->save();
	
	   return redirect('encar/curs/modi');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$curso=Curso::findOrFail($id);
		$curso->delete();
		return redirect('encar/curs/modi');
	}

}

