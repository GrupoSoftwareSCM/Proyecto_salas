<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\Facultad;
use Request;

//use Illuminate\Http\Request;

class AdmUserController extends Controller {


	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function index()
	{
		return view('Administrador.homeAdm');
	}

	public function apui()
	{
		return view('Administrador.crearAdm');
	}

	public function apum()
	{
		return view('Administrador.crearAdm');
	}

	public function cc()
	{
		//$Campus = Campus::all();
		//return dd($Campus);
		return view('Administrador.crearAdm',array('mensaje' => null, 'error' => null));
	}

	public function aec()
	{
		return view('Administrador.crearAdm');
	}

	public function perfuser()
	{
		return view('Administrador.modificarAdm');
	}

	public function camp()
	{
		return view('Administrador.modificarAdm');
	}

	public function encamp()
	{
		return view('Administrador.modificarAdm');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
		public function create()
		{
			
		}

		public function createNewCampus()
		{
			return 'echo';
		}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
    public function storeAPUI()
    {
        $input = Request::all();
        return $input;
    }

    public function storeCC()
    {
        //{"Campus":"macul","Direccion":"qweqweq","latitud":"0.011","longitud":"0.007","Descripcion":"hola"}
        $input = Request::all();



        $Campus = new Campus();
        $Facultad = new Facultad();

        $Campus->nombre 	   = (string)$input['Campus'];
        $Campus->direccion 	   = (string)$input['Direccion'];
        $Campus->latitud 	   = (double)$input['latitud'];
        $Campus->longitud 	   = (double)$input['longitud'];
        $Campus->descripcion   = (string)$input['Descripcion_campus'];
        $Campus->rut_encargado = (int)$input['Rut_Encargado'];

        //$Campus->save();

        //$Facultad->campus();

        $Campus->facultad();

        //$query = Campus::where('nombre',(string)$input['Campus'])->first();
        return ;
        //return view('Administrador.crearAdm',array('mensaje' => $query, 'error' => null));
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
