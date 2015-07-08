@extends('Administrador.header')

@section('content') <!-- EN ESTA SECCION VAMOS A MOSTRAR UNA BARRA LATERAL IZQUIERDA -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <!-- MENU -->

            <div class="panel panel-default">
                <div class="panel-body">
                    Menu
                </div>
                <div class="panel-footer">
                    <ul class="nav nav-sidebar">
                        <li>{!!Html::linkRoute('Admin.Campus.index','Campus')!!}</li>
                        <li>{!!Html::linkRoute('Admin.Facultad.index','Facultad')!!}</li>
                        <li>{!!Html::linkRoute('Admin.Depto.index','Departamento')!!}</li>
                        <li>{!!Html::linkRoute('Admin.Escuela.index','Escuela')!!}</li>
                        <li>{!!Html::linkRoute('Admin.TpoSala.index','Tipos de sala')!!}</li>
                        <li>{!!Html::linkRoute('Admin.Salas.index','Salas')!!}</li>
                </div>
            </div>

        </div>
        <div class="col-md-9">
            @if($_SERVER['REQUEST_URI'] == "/Admin/Salas" || $_SERVER['REQUEST_URI'] == "/Admin/TpoSala" || $_SERVER['REQUEST_URI'] == "/Admin/Escuela" || $_SERVER['REQUEST_URI'] == "/Admin/Depto" || $_SERVER['REQUEST_URI'] == "/Admin/Campus" || $_SERVER['REQUEST_URI'] == "/Admin/Facultad")
                @yield('body')
            @elseif(strpos($_SERVER['REQUEST_URI'],'/create') !== false)
                @yield('createBody')
            @elseif(strpos($_SERVER['REQUEST_URI'],'/edit') !== false)
                @yield('editBody')
            @endif

        </div>
    </div>
</div>

@endsection