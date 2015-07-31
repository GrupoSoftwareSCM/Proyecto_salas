<?php namespace App\Http\Controllers\Excel;

/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 22-07-15
 * Time: 04:33 PM
 */
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\Facultad;
use App\Models\Departamento;
use App\Models\Escuela;
use App\Models\Tipo_Sala;
use App\Models\Sala;
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Rol_Usuario;
use App\Models\Carrera;

use Maatwebsite\Excel\Facades\Excel;


use Illuminate\Http\Request;
use \Illuminate\Contracts\Auth\Guard as Auth;

class FilesController extends Controller{

    public function getFacultad($id){
        $Facultad = Facultad::find($id);
        //dd($Facultad);
        if($Facultad){
            $data = array(
                array('Nombre Facultad','Campus Perteneciente','Descripcion'),
                array($Facultad->nombre,Campus::find($Facultad->campus_id)->nombre,$Facultad->descripcion),
            );

            Excel::create('Facultad_'.$Facultad->nombre, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        }

    }

    public function getFacultadall(){
        $Facultad = Facultad::paginate();
        //dd($Facultad);
        if($Facultad){
            $data = array(
                array('Nombre Facultad','Campus Perteneciente','Descripcion'),
            );
            foreach($Facultad as $Facult){
                $datos = array();
                array_push($datos,$Facult->nombre,Campus::find($Facult->campus_id)->nombre,$Facult->descripcion);
                array_push($data,$datos);
            }

            Excel::create('Facultades', function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');

        }
    }

    public function postUpfacultadfiles(Request $request){

        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));
        //dd(\Storage::disk('local')->put($nombre,  \File::get($file)));

        \Excel::load('/storage/public/files/'.$nombre,function($archivo)
        {
            $result = $archivo->get();    //leer todas las filas del archivo
            foreach($result as $key => $value)
            {
                if(!Facultad::query_nombre($value->nombre_facultad)){
                    $var = new Facultad();
                    $var->fill([
                        'nombre'            => $value->nombre_facultad,
                        'descripcion'       => $value->descripcion,
                        'campus_id'         => Campus::query_nombre($value->campus_perteneciente)->id
                    ]);
                    $var->save();
                }
            }
        })->get();


        \Storage::delete($nombre);

        return redirect()->route('Admin.Facultad.index');

    }

    public function getCampus($id){

        $Campus = Campus::find($id);
        //dd($Campus);
        if ($Campus) {
            $data = array(
                array('Nombre', 'Direccion', 'Latitud', 'Longitud', 'Descripcion', 'Rut encargado'),
                array($Campus->nombre, $Campus->direccion, $Campus->latitud, $Campus->longitud, $Campus->descripcion, $Campus->rut_encargado),
            );

            Excel::create('Campus' . $Campus->nombre, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        } else {
            abort('404');
        }

    }

    public function getCampusall(){
        $Campus = Campus::paginate();
        $data = array(
            array('Nombre', 'Direccion', 'Latitud', 'Longitud', 'Descripcion', 'Rut encargado'),
        );
        foreach($Campus as $camp){
            $datos = array();
            array_push($datos,$camp->nombre,$camp->direccion,$camp->longitud,$camp->latitud,$camp->descripcion,$camp->rut_encargado);
            array_push($data,$datos);
        }
        Excel::create('Campus', function ($excel) use ($data) {

            $excel->sheet('Sheetname', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->download('csv');
    }

    public function postUpcampusfiles(Request $request){

        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));


        \Excel::load('/storage/public/files/'.$nombre,function($archivo)
        {
            $result = $archivo->get();    //leer todas las filas del archivo
            foreach($result as $key => $value)
            {
                if(!Campus::query_nombre($value->campus_perteneciente)){
                    $var = new Campus();
                    $var->fill([
                        'nombre'         => $value->nombre,
                        'direccion'      => $value->direccion,
                        'latitud'        => $value->latitud,
                        'longitud'       => $value->longitud,
                        'descripcion'    => $value->descripcion,
                        'rut_encargado'  => $value->rut_encargado
                    ]);
                    $var->save();
                }
            }
        })->get();


        \Storage::delete($nombre);

        return redirect()->route('Admin.Campus.index');
    }

    public function getDepartamento($id){
        $Depto = Departamento::find($id);
        if($Depto){
            $data = array(
                array('Nombre_Departamento','Facultad_Pertenciente','Descripcion'),
                array($Depto->nombre,$Depto->facultad->nombre,$Depto->descripcion),
            );

            Excel::create('Depto_'.$Depto->nombre, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        }
    }

    public function getDepartamentoall(){
        $Depto = Departamento::paginate();
        //dd($Depto);
        if($Depto){
            $data = array(
                array('Nombre_Departamento','Facultad_Pertenciente','Descripcion'),
            );
            foreach($Depto as $departamento){
                //dd($departamento->facultad->nombre);
                array_push($data,array($departamento->nombre,$departamento->facultad->nombre,$departamento->descripcion));

            }
            Excel::create('Departamentos', function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');

        }

    }

    public function postUpdepartamentosfiles(Request $request){
        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));

        \Excel::load('/storage/public/files/'.$nombre,function($archivo)
        {
            $result = $archivo->get();    //leer todas las filas del archivo

            foreach($result as $key => $value)
            {
                //dd(!Departamento::query_nombre($value->nombre_departamento));
                if(!Departamento::query_nombre($value->nombre_departamento)){
                    $var = new Departamento();
                    $var->fill([
                        'nombre'        => $value->nombre_departamento,
                        'descripcion'   => $value->descripcion,
                        'facultad_id'   => Facultad::query_nombre($value->facultad_pertenciente)->id,
                    ]);
                    $var->save();
                }
            }
        })->get();

        \Storage::delete($nombre);

        return redirect()->route('Admin.Depto.index');
    }

    public function getEscuela($id){
        $Escuela = Escuela::find($id);
        //dd($Escuela->departamento->nombre);
        if($Escuela){
            $data = array(
                array('Nombre_Escuela', 'Depto_Perteneciente', 'Descripcion'),
                array($Escuela->nombre, $Escuela->departamento->nombre, $Escuela->descripcion),
            );

            Excel::create('Escuela_'.$Escuela->nombre, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        }
    }

    public function getEscuelall(){
        $Escuela = Escuela::paginate();
        //dd($Escuela);
        if($Escuela){
            $data = array(
                array('Nombre_Escuela', 'Depto_Perteneciente', 'Descripcion'),
            );
            foreach($Escuela as $escuela){
                array_push($data,array($escuela->nombre,$escuela->departamento->nombre,$escuela->descripcion));

            }

            Excel::create('Escuelas', function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');


        }
    }

    public function postUpescuelafiles(Request $request){

        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));

        \Excel::load('/storage/public/files/'.$nombre,function($archivo)
        {
            $result = $archivo->get();    //leer todas las filas del archivo
            //dd($result);
            foreach($result as $key => $value)
            {

                if(Escuela::Nombre($value->nombre_escuela) == false){
                    //dd(Escuela::query_nombre($value->nombre_escuela));
                    $var = new Escuela();
                    $var->fill([
                        'nombre'        => $value->nombre_escuela,
                        'descripcion'   => $value->descripcion,
                        'departamento_id'   => Departamento::query_nombre($value->depto_perteneciente)->id,
                    ]);
                    $var->save();
                }
            }
        })->get();

        \Storage::delete($nombre);

        return redirect()->route('Admin.Escuela.index');

    }

    public function getTposala($id){
        $tipo = Tipo_Sala::find($id);
        //dd($tipo);
        if($tipo){
            $data = array(
                array('Nombre','Descripcion'),
                array($tipo->nombre,$tipo->descripcion)
            );

            Excel::create('Tipo_de_sala_'.$tipo->nombre, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');

        }

    }

    public function getTposalall(){
        $tipos = Tipo_Sala::paginate();
        //dd($tipo);
        if($tipos){
            $data = array(
                array('Nombre','Descripcion'),
            );
            foreach($tipos as $tipo){
                array_push($data,array($tipo->nombre,$tipo->descripcion));
            }

            Excel::create('Tipo_de_sala_'.$tipo->nombre, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        }
    }

    public function postTposalafiles(Request $request){

        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));


        \Excel::load('/storage/public/files/'.$nombre,function($archivo)
        {
            $result = $archivo->get();    //leer todas las filas del archivo
            foreach($result as $key => $value)
            {
                if(!Tipo_Sala::query_nombre($value->nombre)){
                    $var = new Tipo_Sala();
                    $var->fill([
                        'nombre'        => $value->nombre,
                        'descripcion'   => $value->descripcion,
                    ]);
                    $var->save();
                }
            }
        })->get();

        \Storage::delete($nombre);

        return redirect()->route('Admin.TpoSala.index');

    }

    public function getSala($id){
        $sala = Sala::find($id);
        if($sala){
            $data = array(
                array('nombre','campus_perteneciente','tipo_sala','capacidad','descripcion'),
                array($sala->nombre,$sala->campus->nombre,$sala->tipo_sala->nombre,$sala->capacidad,$sala->descripcion)
            );

            Excel::create('Sala_'.$sala->nombre, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        }
    }

    public function getSalall(){
        $salas = Sala::paginate();
        if($salas){
            $data = array(
                array('nombre','campus_perteneciente','tipo_sala','capacidad','descripcion')
                );
            foreach($salas as $sala){
                array_push($data,array($sala->nombre,$sala->campus->nombre,$sala->tipo_sala->nombre,$sala->capacidad,$sala->descripcion));
            }
        }

        Excel::create('Salas', function ($excel) use ($data) {

            $excel->sheet('Sheetname', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->download('csv');

    }

    public function postSalafiles(Request $request){

        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));


        \Excel::load('/storage/public/files/'.$nombre,function($archivo)
        {
            $result = $archivo->get();    //leer todas las filas del archivo
            //dd($result);
            foreach($result as $key => $value)
            {
                if(!Sala::query_nombre($value->nombre)){
                    $var = new Sala();
                    $var->fill([
                        'nombre'        => $value->nombre,
                        'capacidad'     => $value->capacidad,
                        'descripcion'   => $value->descripcion,
                        'campus_id'     => Campus::query_nombre($value->campus_perteneciente)->id,
                        'tipo_sala_id'  => Tipo_Sala::query_nombre($value->tipo_sala)->id,
                    ]);
                    $var->save();
                }
            }
        })->get();

        \Storage::delete($nombre);

        return redirect()->route('Admin.Salas.index');

}

    public function getAdministrador($id){
        $user = Usuario::find($id);
        //dd($user->roles[0]->nombre);
        if($user){
            $data = array(
                array('Nombres','Apellidos','RUT','E-mail'),
                array($user->nombres,$user->apellidos,$user->rut,$user->email),
            );

            Excel::create('Usuario_'.$user->rut, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');

        }
    }

    public function getAdministradorall(){
        $users = Usuario::paginate();
        //dd($users);
        if($users){
            $data = array(
                array('Nombres','Apellidos','RUT','E-mail'),
            );
            foreach($users as $user){
                foreach($user->roles as $rol){
                    if($rol->nombre == 'ADMINISTRADOR')
                    array_push($data,array($user->nombres,$user->apellidos,$user->rut,$user->email));
                }
            }
            Excel::create('Administradores', function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        }
    }

    public function postAdministradorfiles(Request $request){
        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));


        \Excel::load('/storage/public/files/'.$nombre,function($archivo)
        {
            $result = $archivo->get();    //leer todas las filas del archivo
            $id_admin = Rol::whereNombre('ADMINISTRADOR')->first()->id;
            foreach($result as $key => $value)
            {
                if(count(Usuario::where('rut',$value->rut)->first()) == 0){

                    $var = new Usuario();
                    $var->fill([
                        'nombres'       => $value->nombres,
                        'apellidos'     => $value->apellidos,
                        'rut'           => $value->rut,
                    ]);
                    $var->save();

                    $rol_user = new Rol_Usuario();
                    $rol_user->fill([
                        'rol_id' => $id_admin,
                        'usuario_rut' => $value->rut
                    ]);
                    $rol_user->save();
                }
            }
        })->get();

        \Storage::delete($nombre);

        return redirect()->route('Admin.Administrador.index');
    }

    public function getCarrera($id){
        $carrera = Carrera::find($id);
        if($carrera){
            $data = array(
                array('nombre','codigo','Escuela','descripcion'),
                array($carrera->nombre,$carrera->codigo,$carrera->escuela->nombre,$carrera->descripcion)
            );
            Excel::create('Carrera_'.$carrera->nombre, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        }
    }

    public function getCarrerall(){
        $carreras = Carrera::paginate();
        if($carreras){
            $data = array(
                array('nombre','codigo','Escuela','descripcion'),
            );
            foreach($carreras as $carrera){
                array_push($data,array($carrera->nombre,$carrera->codigo,$carrera->escuela->nombre,$carrera->descripcion));
            }
            Excel::create('Carreras', function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        }
    }

    public function postCarrerafiles(Request $request)
    {

        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre, \File::get($file));


        \Excel::load('/storage/public/files/' . $nombre, function ($archivo) {
            $result = $archivo->get();    //leer todas las filas del archivo
            //dd($result);
            foreach ($result as $key => $value) {
                //dd($value);
                $escuela = Escuela::Nombre($value->escuela);
                $carrera = Carrera::Nombre($value->nombre);
                //dd((boolean)Escuela::whereNombre('asasda')->get());
                if ($escuela == true && $carrera == false) {
                    $var = new Carrera();
                    $var->fill([
                        'nombre' => $value->nombre,
                        'codigo' => $value->codigo,
                        'escuela_id' => Escuela::whereNombre($value->escuela)->get()[0]->id,
                        'descripcion' => $value->descripcion,
                    ]);
                    $var->save();
                }
            }
        })->get();

        \Storage::delete($nombre);

        return redirect()->route('Admin.Carrera.index');


    }
public function postSalafilesEncar(Request $request){

        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));


        \Excel::load('/storage/public/files/'.$nombre,function($archivo)
        {
            $result = $archivo->get();    //leer todas las filas del archivo
            //dd($result);
            foreach($result as $key => $value)
            {  
                if(!Sala::whereNombre($value->nombre)->first()){
                    $var = new Sala();
                    $var->fill([
                        'nombre'        => $value->nombre,
                        'capacidad'     => $value->capacidad,
                        'descripcion'   => $value->descripcion,
                        'campus_id'     => Campus::whereNombre($value->campus_pertenciente)->first()->id,
                        'tipo_sala_id'  => Tipo_Sala::whereNombre($value->tipo_sala)->first()->id,
                    ]);
                    $var->save();
                }
            }
        })->get();

        \Storage::delete($nombre);

        return redirect()->route('encar.salas.modi.index');

}

}