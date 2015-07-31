<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Departamento;



use Illuminate\Support\Facades\Session;

use Request;

class FuncionarioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$funcionario = Funcionario::paginate();
        return view('Administrador.bodyAdm')->with('Funcionarios',$funcionario);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $departamento = Departamento::lists('nombre','id');
        return view('Administrador.crearAdm')->with('depto',$departamento);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\FuncionarioRequest $request)
	{
		$data = $request->only(['nombres','apellidos','rut','email','departamentos']);
        Funcionario::create([
            'nombres'           => $data['nombres'],
            'apellidos'         => $data['apellidos'],
            'rut'               => $data['rut'],
            'email'             => $data['email'],
            'departamento_id'   => (integer)$data['departamentos'],
        ]);

        Session::flash('message', 'Funcionario '.$data['nombres'].'Creado correctamente');
        return redirect()->route('Admin.Funcionario.index');
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
		$funcionario = Funcionario::find($id);
        if($funcionario){
            $departamento = Departamento::lists('nombre','id');
            return view('Administrador.editarAdm')->with('funcionario',$funcionario)->with('depto',$departamento);
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
        $funcionario = Funcionario::find($id);
        if($funcionario){
            $data = Request::only(['nombres','apellidos','email','departamentos']);
            //dd($data);
            $funcionario->fill([
                'nombres' => $data['nombres'],
                'apellidos' => $data['apellidos'],
                'email' => $data['email'],
                'departamento_id' => (integer)$data['departamentos'],
            ]);
            $funcionario->save();
            Session::flash('message', 'Funcionario '.$data['nombres'].' Editado correctamente');
            return redirect()->route('Admin.Funcionario.index');
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
		$funcionario = Funcionario::find($id);
        if($funcionario){
            Session::flash('message', 'Funcionario '.$funcionario->nombres.' Borrado correctamente');
            $funcionario->delete();
            return redirect()->route('Admin.Funcionario.index');
        }
        else{
            abort(404,'id no encontrado');
        }
	}

}
