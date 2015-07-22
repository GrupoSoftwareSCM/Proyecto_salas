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


use Maatwebsite\Excel\Facades\Excel;


use Illuminate\Http\Request;
use \Illuminate\Contracts\Auth\Guard as Auth;

class FilesCampusController extends Controller{

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
    public function postUpfiles(Request $request){

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
        })->get();


        \Storage::delete($nombre);

        return redirect()->route('Admin.Campus.index');
    }
}