<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\Sala;
use App\Models\Tipo_Sala;
use Request;

//use Illuminate\Http\Request;

class SalasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data_campus = Campus::paginate();
        $data_tposala = Tipo_Sala::paginate();
        $data_salas = Sala::paginate();

        return view('Administrador.bodyAdm')->with('Campus',$data_campus)->with('Tposala',$data_tposala)->with('Salas',$data_salas);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $data_campus = Campus::lists('nombre','id_campus');
        $data_tposala = Tipo_Sala::lists('nombre','id_tipos_salas');

        return view('Administrador.crearAdm')->with('Campus',$data_campus)->with('Tposala',$data_tposala);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Request::only(['nombre','descripcion','campus_id','tipo_sala_id']);
        Sala::create($data);

        return redirect()->route('Admin.Salas.index');
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
        $Salas = Sala::find($id);
        $data_campus = Campus::lists('nombre','id_campus');
        $data_tposala = Tipo_Sala::lists('nombre','id_tipos_salas');
        return view('Administrador.editarAdm')->with('Salas',$Salas)->with('Campus',$data_campus)->with('Tposala',$data_tposala);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $Salas = Sala::find($id);
        if($Salas){
            $data = Request::only(['nombre','descripcion','campus_id','tipo_sala_id']);
            $Salas->fill($data);
            $Salas->save();

            return redirect()->route('Admin.Salas.index')->with('mensaje','Campus editado correctamente');

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
        $Salas = Sala::find($id);
        $Salas->delete();
        return redirect()->route('Admin.Salas.index')->with('mensaje','Campus eliminado correctamente');
	}

}
