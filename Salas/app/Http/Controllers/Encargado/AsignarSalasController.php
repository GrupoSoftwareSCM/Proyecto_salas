<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Sala;
use App\Models\Docente;
use Illuminate\Http\Request;
use App\Models\Asignatura_Cursada;
use App\Models\Periodo;
class AsignarSalasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cursos=Curso::paginate();
		$C=Curso::paginate();
		$cantidad_alumno = array();
		foreach ($C as $curso) {
			array_push($cantidad_alumno, Asignatura_Cursada::count_alumnos($curso->id));
		}
		return view('Encargado.asignarSala',compact('cursos'))->with('cantidad_alumno', $cantidad_alumno);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	/*public function getSala($cur,$cant){
     dd($cur);


	}*/
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
		$cursoo=Curso::find($id);
	    $docente=$cursoo->docente;
	    $departamento=$docente->departamento;
	    $facultad=$departamento->facultad;
	    $campus=$facultad->campus;
	   // $sala=$campus->sala;
	    $salass=Sala::mostrar_salas($campus->id);
	    $sa=Sala::paginate();
	    $salasCampus= array();
		$cantidad_alumno =Asignatura_Cursada::count_alumnos($cursoo->id);
		$periodos=Periodo::paginate();
		
	    foreach ($salass as $key => $value) {
	    	$salasCampus[$key] = $value;
	    }
	    $probando = array();
	    foreach ($periodos as $value) {

	    	array_push($probando, $value->inicio.'-'.$value->fin);
	    }
		
	   	dd($probando);	

	   return view('Encargado.ElegirSala',compact('salasCampus','campus','cantidad_alumno','periodos'));

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
