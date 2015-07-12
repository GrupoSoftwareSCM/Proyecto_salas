<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tipo_Sala;
use Request;

//use Illuminate\Http\Request;

class TipoSalasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data_Tposalas = Tipo_Sala::paginate();
        return view('Administrador.bodyAdm')->with('Tposalas', $data_Tposalas);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('Administrador.crearAdm');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\TposalaRequest $request)
	{
        $datos_nuevo_tposala = $request->only(['nombre','descripcion']);
        Tipo_Sala::create($datos_nuevo_tposala);

        return redirect()->route('Admin.TpoSala.index');
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
		$TpoSalas = Tipo_Sala::find($id);
        if($TpoSalas){
            return view('Administrador.editarAdm')->with('TpoSalas', $TpoSalas);
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
        $TpoSalas = Tipo_Sala::find($id);
        if($TpoSalas){
            $datos_edit_tposala = Request::only(['nombre','descripcion']);
            $TpoSalas->fill($datos_edit_tposala);
            $TpoSalas->save();

            return redirect()->route('Admin.TpoSala.index')->with('mensaje','Campus editado correctamente');
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
        $TpoSalas = Tipo_Sala::find($id);
        if($TpoSalas){
            $TpoSalas->delete();
            return redirect()->route('Admin.TpoSala.index')->with('mensaje','Campus eliminado correctamente');
	    }
        else{
            abort(404,'id no encontrado');
        }
    }

}
