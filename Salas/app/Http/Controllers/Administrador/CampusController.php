<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Request;
use App\Models\Campus;
use App\Models\Rol;

//use Illuminate\Http\Request;

class CampusController extends Controller {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data_campu = Campus::paginate();
        return view('Administrador.bodyAdm')->with('campus',$data_campu);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $encargados = Rol::whereNombre('Encargado Campus')->first();
        //dd($encargado->usuarios);
        $encargado = array();
        foreach($encargados->usuarios as $value){
            $encargado[$value->rut] = $value->nombres;
            //array_push($encargado,[$value->rut => $value->nombres]);
        }
        //dd($encargado);
        return view('Administrador.crearAdm')->with('Encargado',$encargado);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CampusRequest $request)
	{
        //dd($request->all());
        $datos= $request->only(['nombre','direccion','latitud','longitud','descripcion','encargado']);
        //$error_bd = array();
        if(count(Campus::whereNombre($datos['nombre'])->first()) > 0){
            Session::flash('message', 'Nombre de campus ya registrado en la base de datos');
            //return view('Administrador.crearAdm');
            return redirect()->route('Admin.Campus.create');
        }
        //dd($datos_nuevo_campus);
        Campus::create([
            'nombre' => ucwords(strtolower($datos['nombre'])),
            'direccion' => $datos['direccion'],
            'latitud' => $datos['latitud'],
            'longitud' => $datos['longitud'],
            'descripcion' => $datos['descripcion'],
            'rut_encargado' => $datos['encargado']
        ]);
        Session::flash('message', 'Campùs creado correctamente');
        return redirect()->route('Admin.Campus.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $Campus = Campus::find($id);
        return view('Administrador.showAdm')->with('show', true)->with('Campus', $Campus);

    }

	/**
	 * Show the form for editing the specified resource.
     * Muestra formulario de edicion
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $Campus = Campus::find($id);
        return view('Administrador.editarAdm')->with('Campus',$Campus);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $Campus = Campus::find($id);
        if($Campus){
            $datos_edit_campus = Request::only(['nombre','direccion','latitud','longitud','descripcion','rut_encargado']);
            $Campus->fill($datos_edit_campus);
            $Campus->save();

            return redirect()->route('Admin.Campus.index')->with('mensaje','Campus editado correctamente');

        }
        else{
            abort(404);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $Campus = Campus::find($id);
        $Campus->delete();
        return redirect()->route('Admin.Campus.index')->with('mensaje','Campus eliminado correctamente');
	}

}
