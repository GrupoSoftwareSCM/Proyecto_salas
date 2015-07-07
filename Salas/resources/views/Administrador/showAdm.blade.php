@extends('Administrador.homeAdm')

@section('showBody')
    <div class="panel panel-success">
        <div class="panel-body">
            Campus
            <a class="glyphicon glyphicon-menu-right"></a>
            Informacion
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="col-md-3">
                        {{--IMAGEN--}}
                    </div>
                    <div class="col-md-9">
                        {{$Campus->nombre}}
                    </div>

                    <div class="col-md-3">
                        {{--IMAGEN--}}
                    </div>
                    <div class="col-md-9">
                        {{$Campus->direccion}}
                    </div>

                    <div class="col-md-3">
                        {{--IMAGEN--}}
                    </div>
                    <div class="col-md-9">
                        {{$Campus->latitud}}
                    </div>

                    <div class="col-md-3">
                        {{--IMAGEN--}}
                    </div>
                    <div class="col-md-9">
                        {{$Campus->longitud}}
                    </div>

                    <div class="col-md-3">
                        {{--IMAGEN--}}
                    </div>
                    <div class="col-md-9">
                        {{$Campus->descripcion}}
                    </div>

                    <div class="col-md-3">
                        {{--IMAGEN--}}
                    </div>
                    <div class="col-md-9">
                        {{$Campus->rut_encargado}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection