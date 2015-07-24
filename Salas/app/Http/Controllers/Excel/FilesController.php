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

                if(!Escuela::query_nombre($value->nombre_escuela)){
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

    }
}