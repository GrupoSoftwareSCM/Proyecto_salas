<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;


//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
//use Illuminate\Http\Request;
use Request;
class ConsultaHorarioController extends Controller {

public function index()
	{
      $campus = \DB::table('campus')->get();
      $bloques = \DB::table('periodos')->get();
     // dd($bloques);
			return view('Encargado.modifHorario')->with('campus',$campus)->with('bloques',$bloques);
	}

	


	
	public function store()
	{
    
    //dd(Request::all());
         // dd(Request::get('bloque'));
		 if(Request::ajax())
          {
           // dd(Request::get('bloque'));
          $datos=array(
          'id_campus' => (int)Request::input('campus'),
          'fecha' =>  Request::input('fecha'),
          'bloque' => Request::input('bloque'),
           );
            $join = \DB::table('horarios')
                    ->join('salas', 'horarios.sala_id', '=', 'salas.id')
                    ->join('periodos', 'horarios.periodo_id', '=', 'periodos.id')
                    ->where('salas.campus_id',$datos['id_campus'])
                    ->where('periodos.bloque',$datos['bloque'])
                    ->where('horarios.fecha',$datos['fecha'])->get();

            //$join = \DB::table('salas')->get();

            return response()->json(array(
              'resultado' => $join
               ));


          }

	
	}

}