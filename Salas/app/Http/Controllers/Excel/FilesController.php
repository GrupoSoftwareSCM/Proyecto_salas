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
use App\Models\Funcionario;
use App\Models\Tipo_Sala;
use App\Models\Sala;
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Rol_Usuario;
use App\Models\Carrera;
use App\Models\Asignatura;
use App\Models\Estudiante;
use App\Models\Curso;
use App\Models\Docente;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use \Illuminate\Contracts\Auth\Guard as Auth;

class FilesController extends Controller{

    public function getFacultad($id){
        $Facultad = Facultad::find($id);
        //dd($Facultad);
        if($Facultad){
            $data = array(
                array('nombre_facultad','campus_perteneciente','descripcion'),
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
                array('nombre_facultad','campus_perteneciente','descripcion'),
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
                $verificadores = $value;
                $llaves = array();
                foreach($verificadores as $llave => $verificador){
                    array_push($llaves,$llave);
                }
                if(count($llaves) == 3 && in_array('nombre_facultad',$llaves) && in_array('campus_perteneciente',$llaves) && in_array('descripcion',$llaves)){

                    if(count(Facultad::whereNombre($value->nombre_facultad)->first()) == 0){
                        if(count(Campus::whereNombre($value->campus_perteneciente)->first()) > 0){
                            $var = new Facultad();
                            $var->fill([
                                'nombre'            => $value->nombre_facultad,
                                'descripcion'       => $value->descripcion,
                                'campus_id'         => Campus::query_nombre($value->campus_perteneciente)->id
                            ]);
                            $var->save();
                            Session::flash('message', 'FACULTAD(ES) CORRECTAMENTE INGRESADAS');
                        }
                        else{
                            Session::flash('message', 'EL CAMPUS INGRESADO: '.$value->nombre_facultad.' NO EXISTE EN LA BASE DE DATOS');
                        }
                    }
                    else{
                        Session::flash('message', 'YA EXISTE LA FACULTAD: '.$value->nombre_facultad.' EN LA BASE DE DATOS');
                    }
                }
                else{
                    Session::flash('message', 'NOMBRES DE LAS COLUMNAS MAL DEFINIDOS');
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
                array('nombre', 'direccion', 'latitud', 'longitud', 'descripcion', 'rut_encargado'),
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
            array('nombre', 'direccion', 'latitud', 'longitud', 'descripcion', 'rut_encargado'),
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
                $verificadores = $value;
                $llaves = array();
                foreach($verificadores as $llave => $verificador){
                    array_push($llaves,$llave);
                }
                //dd($llaves);
                if(count($llaves) == 6 && in_array('nombre',$llaves) && in_array('direccion',$llaves) && in_array('latitud',$llaves) && in_array('longitud',$llaves) && in_array('descripcion',$llaves) && in_array('rut_encargado',$llaves)) {

                    if (count(Campus::whereNombre($value->campus_perteneciente)->first()) == 0) {
                        $var = new Campus();
                        $var->fill([
                            'nombre' => $value->nombre,
                            'direccion' => $value->direccion,
                            'latitud' => $value->latitud,
                            'longitud' => $value->longitud,
                            'descripcion' => $value->descripcion,
                            'rut_encargado' => $value->rut_encargado
                        ]);
                        $var->save();
                        Session::flash('message', 'CAMPUS CORRECTAMENTE INGRESADOS');
                    }
                    else{
                        Session::flash('message', 'YA EXISTE EL CAMPUS: '.$value->nombre.' EN LA BASE DE DATOS');
                    }
                }
                else{
                    Session::flash('message', 'NOMBRES DE LAS COLUMNAS MAL DEFINIDOS');
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
                array('nombre_departamento','facultad_pertenciente','descripcion'),
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
                array('nombre_departamento','facultad_pertenciente','descripcion'),
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
                $verificadores = $value;
                $llaves = array();
                foreach($verificadores as $llave => $verificador){
                    array_push($llaves,$llave);
                }
                //'nombre_departamento','facultad_pertenciente','descripcion'
                if(count($llaves) == 3 && in_array('nombre_departamento',$llaves) && in_array('facultad_pertenciente',$llaves) && in_array('descripcion',$llaves)) {

                    if (count(Departamento::whereNombre($value->nombre_departamento)->first()) == 0) {
                        if(count(Facultad::whereNombre($value->facultad_pertenciente)->first()) > 0){
                            $var = new Departamento();
                            $var->fill([
                                'nombre' => $value->nombre_departamento,
                                'descripcion' => $value->descripcion,
                                'facultad_id' => Facultad::query_nombre($value->facultad_pertenciente)->id,
                            ]);
                            $var->save();
                            Session::flash('message', 'DEPARTAMENTO(S) CORRECTAMENTE INGRESADO(S)');
                        }
                    }
                }
                else{
                    Session::flash('message', 'NOMBRES DE LAS COLUMNAS MAL DEFINIDOS');
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
                array('nombre_escuela', 'pepto_perteneciente', 'descripcion'),
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
                array('nombre_escuela', 'depto_perteneciente', 'descripcion'),
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
                $verificadores = $value;
                $llaves = array();
                foreach($verificadores as $llave => $verificador){
                    array_push($llaves,$llave);
                }
                //'nombre_escuela', 'depto_perteneciente', 'descripcion'
                if(count($llaves) == 3 && in_array('nombre_escuela',$llaves) && in_array('depto_perteneciente',$llaves) && in_array('descripcion',$llaves)){
                    if(count(Escuela::whereNombre($value->nombre_escuela)->first()) == 0){
                        if(count(Departamento::whereNombre($value->depto_perteneciente)->first()) > 0){
                            $var = new Escuela();
                            $var->fill([
                                'nombre'        => $value->nombre_escuela,
                                'descripcion'   => $value->descripcion,
                                'departamento_id'   => Departamento::query_nombre($value->depto_perteneciente)->id,
                            ]);
                            $var->save();
                            Session::flash('message', 'ESCUELA(S) CORRECTAMENTE INGRESADA(S)');
                        }
                        else{
                            Session::flash('message', 'NO SE PUDO INGRESAR '.$value->nombre_escuela.' PORQUE DEPARTAMENTO '.$value->depto_perteneciente.'  NO EXISTE');
                        }
                    }
                    else{
                        Session::flash('message', 'NO SE PUDO INGRESAR '.$value->nombre_escuela.' PORQUE YA EXISTE EN LA BASE DE DATOS');
                    }
                }
                else{
                    Session::flash('message', 'NOMBRES DE LAS COLUMNAS MAL DEFINIDOS');
                }
            }
        })->get();

        \Storage::delete($nombre);

        return redirect()->route('Admin.Escuela.index');

    }

    public function getTposala($id){
        $tipo = Tipo_Sala::find($id);
        if($tipo){
            $data = array(
                array('nombre','descripcion'),
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
                array('nombre','descripcion'),
            );
            foreach($tipos as $tipo){
                array_push($data,array($tipo->nombre,$tipo->descripcion));
            }

            Excel::create('Tipo_de_sala', function ($excel) use ($data) {

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
                $verificadores = $value;
                $llaves = array();
                foreach($verificadores as $llave => $verificador){
                    array_push($llaves,$llave);
                }
                //array('nombre','descripcion'),
                if(count($llaves) == 2 && in_array('nombre',$llaves) && in_array('descripcion',$llaves)){
                    if(count(Tipo_Sala::whereNombre($value->nombre)->first()) == 0){
                        dd(Tipo_Sala::whereNombre($value->nombre)->first());
                        $var = new Tipo_Sala();
                        $var->fill([
                            'nombre'        => $value->nombre,
                            'descripcion'   => $value->descripcion,
                        ]);
                        $var->save();
                    }
                    else{
                        Session::flash('message', 'TIPO DE SALA '.$value->nombre.' YA EXISTENTE EN LA BASE DE DATOS');
                    }
                }
                else{
                    Session::flash('message', 'NOMBRES DE LAS COLUMNAS MAL DEFINIDOS');
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
                array('nombre_sala','campus_perteneciente','tipo_sala','capacidad_sala','descripcion'),
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
                array('nombre_sala','campus_perteneciente','tipo_sala','capacidad_sala','descripcion'),
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
                $verificadores = $value;
                $llaves = array();
                foreach($verificadores as $llave => $verificador){
                    array_push($llaves,$llave);
                }
                //array('nombre_sala','campus_perteneciente','tipo_sala','capacidad_sala','descripcion'),
                if(count($llaves) == 5 && in_array('nombre_sala',$llaves) && in_array('campus_perteneciente',$llaves) && in_array('tipo_sala',$llaves) && in_array('capacidad_sala',$llaves) && in_array('descripcion',$llaves)){
                    if(count(Sala::whereNombre($value->nombre_sala)->first()) == 0){
                        if(count(Campus::whereNombre($value->campus_perteneciente)->first()) > 0){
                            if(count(Tipo_Sala::whereNombre($value->tipo_sala)->first()) > 0){
                                $var = new Sala();
                                $var->fill([
                                    'nombre'        => $value->nombre_sala,
                                    'capacidad'     => $value->capacidad_sala,
                                    'descripcion'   => $value->descripcion,
                                    'campus_id'     => Campus::query_nombre($value->campus_perteneciente)->id,
                                    'tipo_sala_id'  => Tipo_Sala::query_nombre($value->tipo_sala)->id,
                                ]);
                                $var->save();
                                Session::flash('message', 'SALAS CORRECTAMENTE INGRESADA(S)');
                            }
                            else
                                Session::flash('message', 'TIPO DE SALA '.$value->tipo_sala.' NO EXISTE EN LA BASE DE DATOS');
                        }
                        else
                            Session::flash('message', 'Campus '.$value->campus_perteneciente.' NO EXISTE EN LA BASE DE DATOS');
                    }
                    else
                        Session::flash('message', 'SALA '.$value->nombre_sala.' YA EXISTENTE EN LA BASE DE DATOS');
                }
                else{
                    Session::flash('message', 'NOMBRES DE LAS COLUMNAS MAL DEFINIDOS');
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

    public function getCarrera($id){
        $carrera = Carrera::find($id);
        if($carrera){
            $data = array(
                array('nombre_carrera','codigo_carrera','escuela_perteneciente','descripcion'),
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
                array('nombre_carrera','codigo_carrera','escuela_perteneciente','descripcion'),
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
                $verificadores = $value;
                $llaves = array();
                foreach($verificadores as $llave => $verificador){
                    array_push($llaves,$llave);
                }
                //array('nombre_carrera','codigo_carrera','escuela_perteneciente','descripcion'),
                if(count($llaves) == 4 && in_array('nombre_carrera',$llaves) && in_array('codigo_carrera',$llaves) && in_array('escuela_perteneciente',$llaves) && in_array('descripcion',$llaves)){

                    if(count(Carrera::whereNombre($value->nombre_carrera)->first()) == 0 ){
                        if(count(Escuela::whereNombre($value->escuela_perteneciente)->first()) > 0){
                            $var = new Carrera();
                            $var->fill([
                                'nombre' => $value->nombre_carrera,
                                'codigo' => $value->codigo_carrera,
                                'escuela_id' => Escuela::whereNombre($value->escuela_perteneciente)->get()[0]->id,
                                'descripcion' => $value->descripcion,
                            ]);
                            $var->save();
                        }
                        else{
                            Session::flash('message', 'NO SE PUDO INGRESAR '.$value->nombre_carrera.' PORQUE ESCUELA '.$value->escuela_perteneciente.'  NO EXISTE');
                        }
                    }
                    else{
                        Session::flash('message', 'NO SE PUDO INGRESAR '.$value->nombre_carrera.' PORQUE YA EXISTE EN LA BASE DE DATOS');
                    }
                }
                else{
                    Session::flash('message', 'NOMBRES DE LAS COLUMNAS MAL DEFINIDOS');
                }

            }
        })->get();

        \Storage::delete($nombre);

        return redirect()->route('Admin.Carrera.index');


    }

    public function getEncargadoall(){
        $users = Usuario::paginate();
        //dd($users);
        if($users){
            $data = array(
                array('nombres','apellidos','rut','e-mail'),
            );
            foreach($users as $user){
                foreach($user->roles as $rol){
                    if($rol->nombre == 'ENCARGADO_CAMPUS')
                        array_push($data,array($user->nombres,$user->apellidos,$user->rut,$user->email));
                }
            }
            Excel::create('ENCARGADOS', function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        }
    }

    public function getEstudianteall(){
        $users = Usuario::paginate();
        //dd($users);
        if($users){
            $data = array(
                array('nombres','apellidos','rut','e-mail'),
            );
            foreach($users as $user){
                foreach($user->roles as $rol){
                    if($rol->nombre == 'ESTUDIANTE')
                        array_push($data,array($user->nombres,$user->apellidos,$user->rut,$user->email));
                }
            }
            Excel::create('ESTUDIANTE', function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        }
    }

    public function postEstudiantefiles(Request $request){
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
                $verificadores = $value;
                $llaves = array();
                foreach($verificadores as $llave => $verificador){
                    array_push($llaves,$llave);
                }
                //dd($value);
                if(count($llaves) == 5 && in_array('carrera_perteneciente',$llaves) && in_array('nombres',$llaves) && in_array('apellidos',$llaves) && in_array('rut',$llaves) && in_array('e_mail',$llaves)){
                    if(count(Estudiante::where('rut',$value->rut)->first()) == 0){
                        if(count(Carrera::whereNombre($value->carrera_perteneciente)->first())>0){
                            $id_rol = Rol::whereNombre('ESTUDIANTE')->first()->id;
                            $id_carrera = Carrera::whereNombre($value->carrera_perteneciente)->first()->id;

                            $estudiante = new Estudiante();
                            $estudiante->fill([
                                'nombres' => $value->nombres,
                                'apellidos' => $value->apellidos,
                                'rut' => $value->rut,
                                'email' => $value->e_mail,
                                'carrera_id' => $id_carrera,
                            ]);
                            $estudiante->save();

                            if(count(Usuario::where('rut',$value->rut)->first()) == 0){
                                $usuario = new Usuario();
                                $usuario->fill([
                                    'rut' => $value->rut,
                                    'nombres' => $value->nombres,
                                    'apellidos' => $value->apellidos,
                                    'email'  => $value->e_mail,
                                ]);
                                $usuario->save();
                            }

                            $rol = new Rol_Usuario();
                            $rol->fill([
                                'usuario_rut' => $value->rut,
                                'rol_id' =>  $id_rol,
                            ]);
                            $rol->save();
                        }
                    }
                    else{
                        Session::flash('message', 'RUT '.$value->rut.' YA REGISTRADO COMO ESTUDIANTE');
                    }
                }
                else{
                    Session::flash('message', 'NOMBRES DE LAS COLUMNAS MAL DEFINIDOS');
                }

            }
        })->get();

        \Storage::delete($nombre);

        return redirect()->route('Admin.Estudiante.index');


    }

    public function getDocenteall(){
        $users = Usuario::paginate();
        //dd($users);
        if($users){
            $data = array(
                array('nombres','apellidos','rut','e-mail'),
            );
            foreach($users as $user){
                foreach($user->roles as $rol){
                    if($rol->nombre == 'DOCENTE')
                        array_push($data,array($user->nombres,$user->apellidos,$user->rut,$user->email));
                }
            }
            Excel::create('DOCENTE', function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        }
    }

    public function postDocentefiles(Request $request){
        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre, \File::get($file));


        \Excel::load('/storage/public/files/' . $nombre, function ($archivo) {
            $result = $archivo->get();    //leer todas las filas del archivo
            foreach ($result as $key => $value) {
                $verificadores = $value;
                $llaves = array();
                foreach($verificadores as $llave => $verificador){
                    array_push($llaves,$llave);
                }
                //  "nombres","apellidos","rut","e_mail","depto_perteneciente"

                if(count($llaves) == 5 && in_array('depto_perteneciente',$llaves) && in_array('nombres',$llaves) && in_array('apellidos',$llaves) && in_array('rut',$llaves) && in_array('e_mail',$llaves)){
                    if(count(Docente::where('rut',$value->rut)->first()) == 0){
                        if(count(Departamento::whereNombre($value->depto_perteneciente)->first()) > 0){
                            $id_rol = Rol::whereNombre('DOCENTE')->first()->id;
                            $id_depto = Departamento::whereNombre($value->depto_perteneciente)->first()->id;

                            $docente = new Docente();
                            $docente->fill([
                                'nombres' => $value->nombres,
                                'apellidos' => $value->apellidos,
                                'rut' => $value->rut,
                                'email' => $value->e_mail,
                                'carrera_id' => $id_depto,
                            ]);
                            $docente->save();

                            if(count(Usuario::where('rut',$value->rut)->first()) == 0){
                                $usuario = new Usuario();
                                $usuario->fill([
                                    'rut' => $value->rut,
                                    'nombres' => $value->nombres,
                                    'apellidos' => $value->apellidos,
                                    'email'  => $value->e_mail,
                                ]);
                                $usuario->save();
                            }

                            $rol = new Rol_Usuario();
                            $rol->fill([
                                'usuario_rut' => $value->rut,
                                'rol_id' =>  $id_rol,
                            ]);
                            $rol->save();
                        }
                    }
                    else{
                        Session::flash('message', 'RUT '.$value->rut.' YA REGISTRADO COMO DOCENTE');
                    }
                }
                else{
                    Session::flash('message', 'NOMBRES DE LAS COLUMNAS MAL DEFINIDOS');
                }

            }
        })->get();

        \Storage::delete($nombre);

        return redirect()->route('Admin.Docente.index');

    }

    public function getFuncionario($id){
        $funcionario = Funcionario::find($id);
        if($funcionario){
            $data = array(
                array('nombres','apellidos','rut','e_mail','departamento'),
                array($funcionario->nombres,$funcionario->apellidos,$funcionario->rut,$funcionario->email,$funcionario->departamento->nombre)
            );
            Excel::create('FUNCIONARIO'.$funcionario->nombres, function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');

        }
    }

    public function getFuncionarioall(){
        $funcionarios = Funcionario::paginate();
        if($funcionarios){
            $data = array(
                array('nombres','apellidos','rut','e_mail','departamento'),
            );
            foreach($funcionarios as $funcionario){
                array_push($data,array($funcionario->nombres,$funcionario->apellidos,$funcionario->rut,$funcionario->email,$funcionario->departamento->nombre));
            }

            Excel::create('FUNCIONARIO', function ($excel) use ($data) {

                $excel->sheet('Sheetname', function ($sheet) use ($data) {

                    $sheet->fromArray($data);

                });

            })->download('csv');
        }
    }

    public function postFuncionariofiles(Request $request){
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
                $verificadores = $value;
                $llaves = array();
                foreach($verificadores as $llave => $verificador){
                    array_push($llaves,$llave);
                }

                //array('nombres','apellidos','rut','departamento',e_mail),
                if(count($llaves) == 5 && in_array('e_mail',$llaves) && in_array('nombres',$llaves) && in_array('apellidos',$llaves) && in_array('rut',$llaves) && in_array('departamento',$llaves) ){
                    if(count(Funcionario::where('rut',$value->rut)->first())  == 0){
                        if(count(Departamento::whereNombre($value->departamento)->first()) > 0){
                            $id_depto = Departamento::whereNombre($value->departamento)->first()->id;

                            $funcionario = new Funcionario();
                            $funcionario->fill([
                                'nombres' => $value->nombres,
                                'apellidos' => $value->apellidos,
                                'rut' => $value->rut,
                                'departamento_id' => $id_depto
                            ]);
                            $funcionario->save();
                        }
                    }
                }
                else{
                    Session::flash('message', 'NOMBRES DE LAS COLUMNAS MAL DEFINIDOS');
                }
            }
        })->get();

        \Storage::delete($nombre);

        return redirect()->route('Admin.Funcionario.index');
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
    public function postAsigfilesEncar(Request $request){

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

                    if(!Asignatura::where('codigo',$value->codigo)->first()){
                        $var = new Asignatura();
                        $var->fill([
                            'nombre'        => $value->nombre,
                            'codigo'        => $value->codigo,
                            'descripcion'   => $value->descripcion,
                            'departamento_id'=> Departamento::whereNombre($value->departamento)->first()->id,
                        ]);
                        $var->save();
                    }
                }
            })->get();

            \Storage::delete($nombre);

            return redirect()->route('encar.asig.modi.index');

    }
public function postEstufilesEncar(Request $request){

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
                if(!Estudiante::where('nombres',$value->nombre)->first()){
                    $var = new Estudiante();
                    $var->fill([
                        'rut'           => $value->rut,
                        'nombres'       => $value->nombres,
                        'apellidos'     => $value->apellidos,
                        'email'         => $value->email,
                        'carrera_id'    => Carrera::whereNombre($value->carrera)->first()->id,
                    ]);
                    $var->save();
                }
            }
        })->get();

        \Storage::delete($nombre);

        return redirect()->route('encar.estu.modi.index');

}   
public function postCursfileEncar(Request $request){

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
            { // dd(!(Curso::where('seccion',$value->seccion)->first()) && (Curso::where('anio',$value->anio)->first()) && (Curso::where('semestre',$value->semestre)->first()));
                if(!(Curso::where('seccion',$value->seccion)->first()) && (Curso::where('anio',$value->anio)->first()) && (Curso::where('semestre',$value->semestre)->first())){
                    $var = new Curso();
                    $var->fill([
                        'asignatura_id'    => Asignatura::where('nombre',$value->asignatura)->first()->id,
                        'docente_id'       => Docente::where('rut',$value->docente)->first()->id,
                        'semestre'         => $value->semestre,
                        'anio'             => $value->anio,
                        'seccion'          => $value->seccion,
                    ]);
                    $var->save();
                }
            }
        })->get();

        \Storage::delete($nombre);

        return redirect()->route('encar.curs.modi.index');

}   
public function postDocefileEncar(Request $request){

        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));
         

        \Excel::load('/storage/public/files/'.$nombre,function($archivo)
        {
            $result = $archivo->get();    //leer todas las filas del archivo
       //     dd($result);
            foreach($result as $key => $value)
            {   
              //  dd($value->nombres);
                if(!(Docente::where('rut',$value->rut)->first())){
                    $var = new Docente();
                    $var->fill([
                        'departamento_id'  => Departamento::whereNombre($value->departamento)->first()->id,
                        'rut'              => $value->rut,
                        'nombres'          => $value->nombres,
                        'apellidos'        => $value->apellidos,                        
                    ]);
                    $var->save();
                }
            }
        })->get();

        \Storage::delete($nombre);

        return redirect()->route('encar.doce.modi.index');

}   

}