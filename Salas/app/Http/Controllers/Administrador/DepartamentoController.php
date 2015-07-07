<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Facultad;
use App\Models\Departamento;
use Request;

//use Illuminate\Http\Request;

class DepartamentoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data_depto = Departamento::paginate();
        $data_Facultad = Facultad::lists('nombre','id_facultades');
        return view('Administrador.bodyAdm')->with('Departamentos', $data_depto)->with('Facultad', $data_Facultad);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $data_Facultad = Facultad::lists('nombre','id_facultades');
        return view('Administrador.crearAdm')->with('Facultad',$data_Facultad);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $datos_nuevo_depto = Request::only(['nombre','descripcion','facultad_id']);
        Departamento::create($datos_nuevo_depto);

        return redirect()->route('Admin.Depto.index');
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

        $Departamento = Departamento::find($id);
        if($Departamento){
            $Facultad = Facultad::lists('nombre','id_facultades');
            return view('Administrador.editarAdm')->with('Departamento',$Departamento)->with('Facultad',$Facultad);
        }
        else{
            abort(404,'id no encontrado');
        }
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $Departamento = Departamento::find($id);
        if($Departamento){
            $datos_edit_Departamento = Request::only(['nombre','descripcion','facultad_id']);
            $Departamento->fill($datos_edit_Departamento);
            $Departamento->save();

            return redirect()->route('Admin.Depto.index')->with('mensaje','Campus editado correctamente');

        }
        else{
            abort(404,'id no encontrado');
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
        $Departamento = Departamento::find($id);
        if($Departamento){
            $Departamento->delete();
            return redirect()->route('Admin.Depto.index')->with('mensaje','Campus Eliminado correctamente');
        }
        else{
            return redirect()->route('Admin.Depto.index')->with('mensaje','Campus No encontrado');
        }

	}

}
