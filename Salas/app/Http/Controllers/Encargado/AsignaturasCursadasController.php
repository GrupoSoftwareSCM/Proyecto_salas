<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Asignatura_Cursada;
use App\Models\Estudiante;
//use Illuminate\Http\Request;
use Request;
class AsignaturasCursadasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cursos=Curso::paginate(10);
		$C=Curso::paginate();
		$cantidad_alumno = array();
		foreach ($C as $curso) {
			array_push($cantidad_alumno, Asignatura_Cursada::count_alumnos($curso->id));
		}
		return view('Encargado.modificarCursadas',compact('cursos','cantidad_alumno'));
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
		$rut=Request::get('rut');
        $curso=Request::get('curso_id');
		$id=Estudiante::select('id')->where('rut',$rut)->first()->id;

		$asigCursada = Asignatura_Cursada::create(['curso_id' => $curso,'estudiante_id'=> $id]);
        $asigCursada->save();
        return redirect('encar/cursadas/modi');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$curso=Curso::find($id);
		
	    return view('Encargado.AsignarEstudiante',compact('curso'));

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
