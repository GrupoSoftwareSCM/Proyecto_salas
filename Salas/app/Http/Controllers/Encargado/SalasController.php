<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Sala;
use App\Models\Campus;
use App\Models\Tipo_Sala;
//use Illuminate\Http\Request;
use Request;
use DB;



class SalasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$salas = Sala::paginate(); // Cambiar esto, si la db es muy grande queda la escoba
		//$campus= Campus::lists('nombre','id');
		return view('Encargado.modifSalas',compact('salas'));
		//		return view('Encargado.ElegirCampus',compact('campus'));

			
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
	/*	$salas=DB::table('Salas')
            ->join('campus_id', 'salas.id', '=', 'campus_id.id')
            ->join('nombre', 'salas.id', '=', 'nombre.id')
            ->select()
            ->get();*/ 
       // dd($salas);
            
     //   $idd = Campus::where('nombre','=','$ide')->lists('id');
      //  dd($idd);
        
        		//$salas = Sala::where('campus_id','=','$id')->paginate();
		//return dd($salas);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 $sala =Sala::findOrFail($id);
		 $tipo_sala = Tipo_Sala::lists('nombre','id');
		 $campus=Campus::lists('nombre','id');
		return view('Encargado.editarSalas',compact('sala','tipo_sala','campus'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$sala = Sala::findOrFail($id);		
		$sala->fill(Request::all());
		$sala->save();
		
		return redirect('encar/salas/modi');
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
