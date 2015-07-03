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
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-md-9">

            @if($_SERVER['REQUEST_URI'] == "/Admin/Campus")
                @yield('body')
            @elseif($_SERVER['REQUEST_URI'] == "/Admin/Campus/create")
                @yield('createBody')
            @elseif(strpos($_SERVER['REQUEST_URI'],'/edit') !== false)
                @yield('editBody')
            @endif

        </div>
    </div>
</div>

@endsection