@extends('Encargado.header')

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
                        <li>{!!Html::linkRoute('encar.asig.modi.index','Asignaturas')!!}</li>
                    </ul>
                     <ul class="nav nav-sidebar">
                        <li>{!!Html::linkRoute('encar.estu.modi.index','Estudiantes')!!}</li>
                    </ul>
                     <ul class="nav nav-sidebar">
                        <li>{!!Html::linkRoute('encar.curs.modi.index','Cursos')!!}</li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-md-9">

         @if($_SERVER['REQUEST_URI'] == "/encar/asig/modi")
                @yield('content2')
         @endif
         @if($_SERVER['REQUEST_URI'] == "/encar/estu/modi")
                @yield('content4')
         @endif
         @if($_SERVER['REQUEST_URI'] == "/encar/curs/modi")
                @yield('content3')
         @endif

        </div>
    </div>
</div>
@endsection