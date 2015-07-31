<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Facultad;
use App\Models\Campus;
use Request;
use Illuminate\Support\Facades\Session;
//use Illuminate\Http\Request as Request;

class FacultadController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data_facultad = Facultad::paginate();
        $data_Campus = Campus::lists('nombre','id');
		return view('Administrador.bodyAdm')->with('facultades', $data_facultad)->with('Campus', $data_Campus);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $data_campus = Campus::lists('nombre','id');
        return view('Administrador.crearAdm')->with('campus',$data_campus);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\FacultadRequest $request)
	{
        $data = $request->only(['nombre','descripcion','campus_id']);
        if(count(Facultad::whereNombre($data['nombre'])->first())== 0)
            Facultad::create($data);
        else{
            Session::flash('alert', $data['nombre'].' Ya existente en la base de datos');
            return redirect()->route('Admin.Facultad.create');
        }
        Session::flash('message', 'Facultad '.$data['nombre'].' Creada correctamente');
        return redirect()->route('Admin.Facultad.index');
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
        $Facultad = Facultad::find($id);
        $Campus = Campus::lists('nombre','id');
        return view('Administrador.editarAdm')->with('Facultad',$Facultad)->with('Campus',$Campus);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $Facultad = Facultad::find($id);
        if($Facultad){
            $data = Request::only(['nombre','descripcion','campus_id']);
            $Facultad->fill($data);
            $Facultad->save();
            Session::flash('message', 'Facultad '.$data['nombre'].' Creada correctamente');
            return redirect()->route('Admin.Facultad.index');

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
        $Facultad = Facultad::find($id);
        if($Facultad){
            Session::flash('destroy', 'Facultad '.$Facultad->nombre.' Eliminada correctamente');
            $Facultad->delete();
            return redirect()->route('Admin.Facultad.index');
        }
        else{
            abort(404,'id no encontrado');
        }

	}

}
