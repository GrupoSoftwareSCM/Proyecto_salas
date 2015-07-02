<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\Facultad;
use App\Models\Departamento;
use App\Models\Escuela;
use Request;
use DB;

//use Illuminate\Http\Request;

class AdmUserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function index()
    {
		return view('Administrador.homeAdm');
	}

    public function crearFacult()
    {
        $input = Request::all();
        $numero_campus = Campus::all()->count();
        $campus = Campus::lists('nombre','id_campus');
        if( $input == null)
        {
            return view('Administrador.crearAdm',array(
                'numero_campus' => $numero_campus,
                'error' => array(),
                'facultades' => null,
                'campus' => $campus,
                'id_campus' => null,
                'mensaje' => null,
            ));
        }
        else
        {
            return view('Administrador.crearAdm',array(
                'numero_campus' => $numero_campus,
                'error' => array(),
                'facultades' => (int)$input['numero_facultad'],
                'campus' => $campus,
                'id_campus' => $input['id_campus'],
                'mensaje' => null,
            ));
        }
    }

    public function crearDepto()
    {
        $input = Request::all();
        $numero_campus = Campus::all()->count();
        $numero_facultad = Facultad::all()->count();
        $facultades = Facultad::lists('nombre','id_facultades');
        if($input == null){
            return view('Administrador.crearAdm',array(
                'numero_campus' => $numero_campus,
                'numero_facultad' => $numero_facultad,
                'Facultades' => $facultades,
                'error' => array(),
                'mensaje' => null,
                'numero_departamento' => null,
                'id_facultad' => null
            ));
        }
        else
        {
            return view('Administrador.crearAdm',array(
                'numero_campus' => $numero_campus,
                'numero_facultad' => $numero_facultad,
                'Facultades' => $facultades,
                'error' => array(),
                'mensaje' => null,
                'numero_departamento' => (int)$input['numero_departamento'],
                'id_facultad' => $input['id_facultad']
            ));
        }
    }

    public function crearEscuela()
    {
        $input = Request::all();
        $numero_campus = Campus::all()->count();
        $numero_facultad = Facultad::all()->count();
        $numero_departamento = Departamento::all()->count();

        $depto = Departamento::lists('nombre','id_departamentos');

        if($input == null){
            return view('Administrador.crearAdm',array(
                'numero_campus' => $numero_campus,
                'numero_facultad' => $numero_facultad,
                'numero_departamento' => $numero_departamento,
                'depto' => $depto,
                'numero_escuela' => null,
                'id_depto' => null,
                'error' => array(),
                'mensaje' => null
            ));
        }
        else{
            //return dd($input);
            return view('Administrador.crearAdm',array(
                'numero_campus' => $numero_campus,
                'numero_facultad' => $numero_facultad,
                'numero_departamento' => $numero_departamento,
                'depto' => $depto,
                'numero_escuela' => (int)$input['numero_escuela'],
                'id_depto' => $input['id_depto'],
                'error' => array(),
                'mensaje' => null
            ));
        }
    }

    /*FUNCIONES PARA MODIFICAR*/
	public function Modifperfuser()
	{
		return view('Administrador.modificarAdm');
	}

	public function Modifcamp()
	{
        $input = Request::all();
        $Campus = Campus::lists('nombre','id_campus');
        if($input == null){
            return view('Administrador.modificarAdm', array(
                'Campus' => $Campus,
                'datos_campus' => null,
                'campus_select' => null,
                'error' => null,
                'mensaje' => null
            ));
        }
        else{
            //return dd($datos_campus);
            $datos_campus = Campus::find($input['id_campus']); // FIND BUSCA POR ID
            return view('Administrador.modificarAdm', array(
                'Campus' => $Campus,
                'datos_campus' => $datos_campus,
                'campus_select' => $input['id_campus'],
                'error' => null,
                'mensaje' => null
            ));
        }

	}

	public function Modifencamp()
	{
		return view('Administrador.modificarAdm');
	}

    public function ModifFacult()
    {
        $input = Request::all();
        $Facultad = Facultad::lists('nombre','id_facultades');

        if($input == null){
            return view('Administrador.modificarAdm',array(
                'Facultad' => $Facultad,
                'facultad_select' => null,
                'datos_facultad' => null,
                'nombre_campus' => null,
                'error' => null,
                'mensaje' => null
            ));
        }
        else{
            $datos_facultad = Facultad::find($input['id_facultad']);
            $campus = Campus::find($datos_facultad['campus_id']);


            return view('Administrador.modificarAdm',array(
                'Facultad' => $Facultad,
                'facultad_select' => $input['id_facultad'],
                'datos_facultad' => $datos_facultad,
                'nombre_campus' => $campus['nombre'],
                'error' => null,
                'mensaje' => null
            ));
        }
    }

    public function ModifDepto()
    {
        $input = Request::all();
        $Depto = Departamento::lists('nombre','id_departamentos');

        if($input == null){
            return view('Administrador.modificarAdm',array(
                'Depto' => $Depto,
                'depto_select' => null,
                'datos_depto' => null,
                'nombre_facultad' => null,
                'error' => null,
                'mensaje' => null
            ));
        }
        else{
            $datos_depto = Departamento::find($input['id_Depto']);
            $nombre_facultad = Facultad::find($datos_depto['facultad_id']);

            return view('Administrador.modificarAdm',array(
                'Depto' => $Depto,
                'depto_select' => $input['id_Depto'],
                'datos_depto' => $datos_depto,
                'nombre_facultad' => $nombre_facultad['nombre'],
                'error' => null,
                'mensaje' => null
            ));
        }
    }

    public function ModifEscuela()
    {
        $input = Request::all();
        $escuela = Escuela::lists('nombre','id_escuelas');

        if($input == null){
            return view('Administrador.modificarAdm',array(
                'escuela' => $escuela,
                'escuela_select' => null,
                'datos_escuela' => null,
                'nombre_depto' => null,
                'error' => null,
                'mensaje' => null
            ));
        }
        else{
            $datos_escuela = Escuela::find($input['id_escuela']);
            $nombre_depto = Departamento::find($datos_escuela['departamento_id']);

            return view('Administrador.modificarAdm',array(
                'escuela' => $escuela,
                'escuela_select' => $input['id_escuela'],
                'datos_escuela' => $datos_escuela,
                'nombre_depto' => $nombre_depto['nombre'],
                'error' => null,
                'mensaje' => null
            ));
        }

    }
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
    public function create()
    {
        return view('Administrador.homeAdm');
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
    public function store()
    {
       //
    }


    public function storeFacult()
    {
        $input = Request::all();
        $numero_campus = Campus::all()->count();
        $campus = Campus::lists('nombre','id_campus');

        for($i = 0;$i<$input['numero_facultad'];$i++){
            $Facultad = new Facultad();

            $Facultad->nombre = (string)$input['Nombre_facultad_'.$i];
            $Facultad->descripcion = (string)$input['Descripcion_facultad_'.$i];

            //ACA TIENE QUE IR UN SAVE() PERO ME FALTA ENLAZAR FK DE CAMPUS
            $Facultad->campus_id = $input['id_campus'];

            $Facultad->save();
        }

        return view('Administrador.crearAdm',array(
            'numero_campus' => $numero_campus,
            'error' => array(),
            'facultades' => $input['numero_facultad'],
            'campus' => $campus,
            'id_campus' => $input['id_campus'],
            'mensaje' => "Facultad(es) ingresada(s) correctamente"
        ));
    }

    public function storeDepto()
    {
        $input = Request::all();
        $facultades = Facultad::lists('nombre','id_facultades');

        for($i = 0;$i<$input['numero_departamento'];$i++){
            $depto = new Departamento();

            $depto->nombre = (string)$input['Nombre_depto_'.$i];
            $depto->descripcion = (string)$input['Descripcion_depto_'.$i];

            $depto->facultad_id = $input['id_facultad'];

            $depto->save();

        }


        return view('Administrador.crearAdm',array(
            'numero_campus' => $input['numero_campus'],
            'numero_facultad' => $input['numero_facultad'],
            'Facultades' => $facultades,
            'error' => array(),
            'mensaje' => "Se han ingresado correctamente",
            'numero_departamento' => $input['numero_departamento'],
            'id_facultad' => (int)$input['id_facultad']
        ));

    }

    public function storeEscuela()
    {
        $input = Request::all();
        $depto = Departamento::lists('nombre','id_departamentos');

        for($i=0;$i<$input['numero_escuela'];$i++){
            $escuela = new Escuela();

            $escuela->nombre = (string)$input['Nombre_escuela_'.$i];
            $escuela->descripcion = (string)$input['Descripcion_escuela_'.$i];

            $escuela->departamento_id = $input['id_depto'];

            $escuela->save();
        }

        return view('Administrador.crearAdm',array(
            'numero_campus' => $input['numero_campus'],
            'numero_facultad' => $input['numero_facultad'],
            'numero_departamento' => $input['numero_departamento'],
            'depto' => $depto,
            'numero_escuela' => null,
            'id_depto' => null,
            'error' => array(),
            'mensaje' => "Escuela(s) ingresada(s) correctamente"
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
	public function updateCamps($id = null)
	{
        $input = Request::all();


        $campus = Campus::find($input['id_campus']);

        $campus->nombre = $input['Nombre_campus'];
        $campus->direccion = $input['Direccion'];
        $campus->latitud = $input['latitud'];
        $campus->longitud = $input['longitud'];
        $campus->descripcion = $input['Descripcion_campus'];
        $campus->rut_encargado = $input['Rut_Encargado'];

        $campus->save();

        $Campus = Campus::lists('nombre','id_campus');

        return view('Administrador.modificarAdm', array(
        'Campus' => $Campus,
        'datos_campus' => null,
        'error' => null,
        'mensaje' => 'Campus actualizado correctamente'
    ));

	}

    public function updateFacult($id = null)
    {
        $input = Request::all();

        $Facultad = Facultad::find($input['id_facultad']);

        $Facultad->nombre = (string)$input['Nombre_facultad'];
        $Facultad->descripcion = (string)$input['Descripcion_facultad'];

        $Facultad->save();

        $facultad = Facultad::lists('nombre','id_facultades');

        return view('Administrador.modificarAdm',array(
            'Facultad' => $facultad,
            'facultad_select' => null,
            'datos_facultad' => null,
            'nombre_campus' => null,
            'error' => null,
            'mensaje' => 'Facultad actualizada correctamente'
        ));
    }

    public function updateDepto($id = null)
    {
        $input = Request::all();

        $Departamento = Departamento::find($input['id_Depto']);

        $Departamento->nombre = (string)$input['Nombre_depto'];
        $Departamento->descripcion = (string)$input['Descripcion_depto'];

        $Departamento->save();

        $Depto = Departamento::lists('nombre','id_departamentos');
        return view('Administrador.modificarAdm',array(
            'Depto' => $Depto,
            'depto_select' => $input['id_Depto'],
            'datos_depto' => null,
            'nombre_facultad' => null,
            'error' => null,
            'mensaje' => 'Departamentos actualizada correctamente'
        ));
    }

    public function updateEscuela($id = null)
    {
        $input = Request::all();

        $Escuela = Escuela::find($input['id_escuela']);

        $Escuela->nombre = (string)$input['Nombre_escuela'];
        $Escuela->descripcion = (string)$input['Descripcion_escuela'];

        $Escuela->save();

        $escuela = Escuela::lists('nombre','id_escuelas');
        return view('Administrador.modificarAdm',array(
            'escuela' => $escuela,
            'escuela_select' => $input['id_escuela'],
            'datos_escuela' => null,
            'nombre_depto' => null,
            'error' => null,
            'mensaje' => 'Escuela actualizada correctamente'
        ));
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
