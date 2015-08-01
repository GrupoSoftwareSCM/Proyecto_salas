<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Facultad;
use App\Models\Departamento;
use Request;
use Illuminate\Support\Facades\Session;

//use Illuminate\Http\Request;

class DepartamentoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if(Request::all()){
            $request = Request::only(['facultad','nombre']);
            if($request['nombre'] != ''){
                $data_depto = Departamento::whereNombre($request['nombre'])->where('facultad_id',$request['facultad'])->paginate(5);
                $data_Facultad = Facultad::lists('nombre','id');
                return view('Administrador.Departamento.Body')->with('Departamentos', $data_depto)->with('Facultad', $data_Facultad);
            }
            else{
                $data_depto = Departamento::where('facultad_id',$request['facultad'])->paginate(5);
                $data_Facultad = Facultad::lists('nombre','id');
                return view('Administrador.Departamento.Body')->with('Departamentos', $data_depto)->with('Facultad', $data_Facultad);
            }
        }
        $data_depto = Departamento::paginate(5);
        $data_Facultad = Facultad::lists('nombre','id');
        return view('Administrador.Departamento.Body')->with('Departamentos', $data_depto)->with('Facultad', $data_Facultad);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $data_Facultad = Facultad::lists('nombre','id');
        return view('Administrador.Departamento.Crear')->with('Facultad',$data_Facultad);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\DepartamentoRequest $request)
	{
        $data = $request->only(['nombre','descripcion','facultad_id']);
        if(count(Departamento::whereNombre($data['nombre'])->first()) == 0){
            Departamento::create($data);
        }
        else{
            if(Departamento::whereNombre($data['nombre'])->first()->facultad->id != $data['facultad_id']){
                Departamento::create($data);
            }
            else{
                Session::flash('alert', 'Departamento: '.$data['nombre'].' Pertenciente a la Facultad'.Facultad::find($data['facultad_id'])->nombre.' Ya existente en la base de datos');
                return redirect()->route('Admin.Depto.create');
            }
        }
        Session::flash('message', 'Departamento: '.$data['nombre'].' Pertenciente a la Facultad'.Facultad::find($data['facultad_id'])->nombre.' Creado exitosamente');
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
            $Facultad = Facultad::lists('nombre','id');
            return view('Administrador.Departamento.Editar')->with('Departamento',$Departamento)->with('Facultad',$Facultad);
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
            $data = Request::only(['nombre','descripcion','facultad_id']);
            $Departamento->fill($data);
            $Departamento->save();
            Session::flash('message', 'Departamento '.$data['nombre'].' Creado correctamente');
            return redirect()->route('Admin.Depto.index');

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
            Session::flash('destroy', 'Departamento '.$Departamento->nombre.' Eliminado correctamente');
            $Departamento->delete();
            return redirect()->route('Admin.Depto.index')->with('mensaje','Campus Eliminado correctamente');
        }
        else{
            abort(404,'id no encontrada');
        }

	}

}
