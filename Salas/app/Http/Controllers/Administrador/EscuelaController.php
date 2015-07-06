<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Models\Escuela;
use Request;

//use Illuminate\Http\Request;

class EscuelaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data_escuela = Escuela::paginate();
        return view('Administrador.bodyAdm')->with('Escuelas', $data_escuela);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $data_departamento = Departamento::lists('nombre','id_departamentos');
        return view('Administrador.crearAdm')->with('Departamento',$data_departamento);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $datos_nuevo_escuela = Request::only(['nombre','descripcion','departamento_id']);
        Escuela::create($datos_nuevo_escuela);

        return redirect()->route('Admin.Escuela.index');
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
        $Escuela = Escuela::find($id);
        if($Escuela){
            $Departamento = Departamento::lists('nombre','id_departamentos');
            return view('Administrador.editarAdm')->with('Escuela',$Escuela)->with('Departamento',$Departamento);
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
        $Escuela = Escuela::find($id);
        if($Escuela){
            $datos_edit_Escuela = Request::only(['nombre','descripcion','departamento_id']);
            $Escuela->fill($datos_edit_Escuela);
            $Escuela->save();

            return redirect()->route('Admin.Escuela.index')->with('mensaje','Campus editado correctamente');

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
        $Escuela = Escuela::find($id);
        if($Escuela){
            $Escuela->delete();
            return redirect()->route('Admin.Escuela.index')->with('mensaje','Campus Eliminado correctamente');
        }
        else{
            return redirect()->route('Admin.Escuela.index')->with('mensaje','Campus No encontrado');
        }
	}

}
