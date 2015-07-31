@extends('Estudiantes.header')

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
                        <li>{!!Html::linkRoute('estu.horario.index','Horario')!!}</li>
                    </ul>
                    
                </div>
            </div>

        </div>
        <div class="col-md-9">

         @if($_SERVER['REQUEST_URI'] == "/estu/horario")
                @yield('content')
         @endif
         
        </div>
    </div>
</div>
@endsection

