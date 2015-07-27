<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Carrera;
use App\Models\Escuela;
use Request;

class CarreraController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
    {
        $data = Carrera::paginate();
		return view('Administrador.bodyAdm')->with('Carreras',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $data = Escuela::lists('nombre','id');
		return view('Administrador.crearAdm')->with('Escuela',$data);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CarreraRequest $request)
	{
		//dd($request->all());
        $data = $request->only(['nombre','codigo','escuela','descripcion']);
        //dd($data);
        $carrera = new Carrera();
        $carrera->fill([
           'nombre'         => $data['nombre'],
            'codigo'        => $data['codigo'],
            'escuela_id'    => $data['escuela'],
            'descripcion'   => $data['descripcion']
        ]);
        $carrera->save();

        return redirect()->route('Admin.Carrera.index');

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
		$carrera = Carrera::find($id);
        if($carrera){
            $data = Escuela::lists('nombre','id');
            return view('Administrador.editarAdm')->with('Escuela',$data)->with('Carrera', $carrera);
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
		$carrera = Carrera::find($id);
        if($carrera){
            $data = Request::only(['nombre','codigo','escuela','descripcion']);
            $carrera->fill([
                'nombre'         => $data['nombre'],
                'codigo'        => $data['codigo'],
                'escuela_id'    => $data['escuela'],
                'descripcion'   => $data['descripcion']
            ]);
            $carrera->save();
            return redirect()->route('Admin.Carrera.index');
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
		$carrera = Carrera::find($id);
        if($carrera){
            $carrera->delete();
            return redirect()->route('Admin.Carrera.index');
        }
	}

}
