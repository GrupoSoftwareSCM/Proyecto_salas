<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\Facultad;
use App\Models\Departamento;
use Request;
use DB;

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
		return view('Administrador.crearAdm',array('mensaje' => null, 'error' => null,));
	}

	public function aec()
	{
		return view('Administrador.crearAdm');
	}

    public function Facult()
    {
        $input = Request::all();
        $numero_campus = Campus::all()->count();
        $campus = Campus::lists('nombre');
        if( $input == null)
        {
            return view('Administrador.crearAdm',array(
                'numero_campus' => $numero_campus,
                'error' => array(),
                'facultades' => null,
                'campus' => $campus,
                'nombre_campus' => null,
                'mensaje' => null
            ));
        }
        else
        {
            return view('Administrador.crearAdm',array(
                'numero_campus' => $numero_campus,
                'error' => array(),
                'facultades' => $input['numero_facultad'],
                'campus' => $campus,
                'nombre_campus' => $input['nombre_campus'],
                'mensaje' => null
            ));
        }
    }

    public function Depto()
    {
        $numero_campus = Campus::all()->count();
        $numero_facultad = Facultad::all()->count();
        return view('Administrador.crearAdm',array(
            'numero_campus' => $numero_campus,
            'numero_facultad' => $numero_facultad,
            'error' => array()
        ));
    }
    public function Escuela()
    {
        $numero_campus = Campus::all()->count();
        $numero_facultad = Facultad::all()->count();
        $numero_departamento = Departamento::all()->count();
        return view('Administrador.crearAdm',array(
            'numero_campus' => $numero_campus,
            'numero_facultad' => $numero_facultad,
            'numero_departamento' => $numero_departamento,
            'error' => array()
        ));
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
        $input = Request::all();

        $Campus = new Campus();

        $Campus->nombre 	   = (string)$input['Campus'];
        $Campus->direccion 	   = (string)$input['Direccion'];
        $Campus->latitud 	   = (double)$input['latitud'];
        $Campus->longitud 	   = (double)$input['longitud'];
        $Campus->descripcion   = (string)$input['Descripcion_campus'];
        $Campus->rut_encargado = (int)$input['Rut_Encargado'];

        $Campus->save();

        $query = Campus::where('nombre',(string)$input['Campus'])->first();
        return view('Administrador.crearAdm',array('mensaje' => $query, 'error' => null));
    }

    public function storeFacult()
    {
        /*
         * "Nombre_facultad_0":"","Descripcion_facultad_0":"","Nombre_facultad_1":"","Descripcion_facultad_1":"",
         * "numero_facultad":"2","nombre_campus":"Macul"}
         * */
        $input = Request::all();
        $numero_campus = Campus::all()->count();
        $campus = Campus::lists('nombre');

        for($i = 0;$i<$input['numero_facultad'];$i++){
            $Facultad = new Facultad();

            $Facultad->nombre = (string)$input['Nombre_facultad_'.$i];
            $Facultad->descripcion = (string)$input['Descripcion_facultad_'.$i];


        }

        return view('Administrador.crearAdm',array(
            'numero_campus' => $numero_campus,
            'error' => array(),
            'facultades' => $input['numero_facultad'],
            'campus' => $campus,
            'nombre_campus' => $input['nombre_campus'],
            'mensaje' => "Facultad ingresada correctamente"
        ));
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
