@extends('Encargado.header')

@section('content') <!-- EN ESTA SECCION VAMOS A MOSTRAR UNA BARRA LATERAL IZQUIERDA -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <!-- MENU -->


            <nav class="navbar navbar-default" role="navigation">
                <!-- El logotipo y el icono que despliega el menú se agrupan
                     para mostrarlos mejor en los dispositivos móviles -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Desplegar navegación</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--<a class="navbar-brand" href="#">Logotipo</a>-->
                    {!! Html::image('/img/Logotipo_UTEM.png','logoTipo',['class'=>'navbar-brand']) !!}
                </div>

                <!-- Agrupar los enlaces de navegación, los formularios y cualquier
                     otro elemento que se pueda ocultar al minimizar la barra -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle glyphicon glyphicon-education" data-toggle="dropdown">
                                Universidad<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                        <li>{!!Html::linkRoute('encar.asig.modi.index','Asignaturas')!!}</li>
                        <li>{!!Html::linkRoute('encar.estu.modi.index','Estudiantes')!!}</li>
                        <li>{!!Html::linkRoute('encar.curs.modi.index','Cursos')!!}</li>
                        <li>{!!Html::linkRoute('encar.salas.modi.index','Salas')!!}</li>
                        <li>{!!Html::linkRoute('encar.asignar.modi.index','Asignar Salas')!!}</li>
                        <li>{!!Html::linkRoute('encar.doce.modi.index','Docente')!!}</li>
                        <li>{!!Html::linkRoute('encar.hora.modi.index','Horario')!!}</li>
                        <li>{!!Html::linkRoute('encar.cursadas.modi.index','Asignaturas Cursadas')!!}</li>
                    </ul>
                </div>

        </div>
         @if($_SERVER['REQUEST_URI'] == "/encar/home")
        <div class="col-md-9">
            <div class="panel panel-success">
        <div class="panel-body">
            Bienvenido
        </div>
        <div class="panel-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 col-xs-3">
                        {!! Html::image('/img/rector.jpg','rector',['class'=>'img-circle']) !!}
                    </div>
                    <div class="col-md-10 col-xs-12">
                        <em>
                            <br/>
                            Estimados/as Administrador,
                            Bienvenido al servicio de Consulta de salas, desarrollado por los estudiantes de
                            ingenieria en informatica de nuestra universidad. Estoy seguro que este será un espacio
                            de gran utilidad para ustedes.
                            <br/>
                            Aquí, en un solo lugar, podran crear diversos dependencias de nuestra universidad asi como
                            un encargado a cada campus, alumnos y docentes.
                            <br/>
                            Para nuestra Universidad podran crear campus, facultades, etc y asignarle los usuarios ya creados
                            por usted, GENIAL no ? ahora te pido que ocupes este espacio con responsabilidad, si estas calificadando
                            para un ramo te pido misericordia, que tengas un buen provecho con la aplicacion
                            Atentamente,

                            Luis Pinto Faverio Rector UTEM
                        </em>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endif
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
          @if($_SERVER['REQUEST_URI'] == "/encar/salas/modi")
                @yield('content5')
         @endif
         @if($_SERVER['REQUEST_URI'] == "/encar/asignar/modi")
                @yield('content6')
         @endif
         @if($_SERVER['REQUEST_URI'] == "/encar/doce/modi")
                @yield('content7')
         @endif
         @if($_SERVER['REQUEST_URI'] == "/encar/hora/modi")
                @yield('content9')
         @endif
          @if($_SERVER['REQUEST_URI'] == "/encar/cursadas/modi")
                @yield('content10')
         @endif
        </div>
    </div>
</div>
@endsection


