@extends('Administrador.header')

@section('content')
<div class="row">
	<!--<div class="col-md-10 col-md-offset-1">-->



				@if($_SERVER['REQUEST_URI'] == "/adm")
						Bienvenido admnistrador, en esta pagina usted podra ..............................
				@endif

				<!--	MENU PARA CREAR	-->
				@if($_SERVER['REQUEST_URI'] == "/adm/crear/Deptos" || $_SERVER['REQUEST_URI'] == "/adm/crear" || $_SERVER['REQUEST_URI'] == "/adm/crear/cc" || $_SERVER['REQUEST_URI'] == "/adm/crear/aec" || $_SERVER['REQUEST_URI'] == "/adm/crear/apui" || $_SERVER['REQUEST_URI'] == "/adm/crear/apum" || $_SERVER['REQUEST_URI'] == "/adm/crear/Facult" || $_SERVER['REQUEST_URI'] == "/adm/crear/Escuela" || $_SERVER['REQUEST_URI'] == "/adm/crear/Depto" || $_SERVER['REQUEST_URI'] == "/adm/crear/Facults")
                    <div class="col-md-2 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav nav-tabs">
                                        @if($_SERVER['REQUEST_URI'] == "/adm/crear/apui" || $_SERVER['REQUEST_URI'] == "/adm/crear/apum")
                                            <li class="active" class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown">
                                                    Asignar perfiles a usuarios
                                                    <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{url('/adm/crear/apui')}}">Individual</a></li>
                                                    <li><a href="{{url('/adm/crear/apum')}}">Masivo</a></li>
                                                </ul>
                                            </li>
                                        @else
                                            <li class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown">
                                                    Asignar perfiles a usuarios
                                                    <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{url('/adm/crear/apui')}}">Individual</a></li>
                                                    <li><a href="{{url('/adm/crear/apum')}}">Masivo</a></li>
                                                </ul>
                                            </li>
                                        @endif

                                        @if($_SERVER['REQUEST_URI'] == "/adm/crear/cc")
                                            <li class="active"><a href="{{url('adm/crear/cc')}}">Crear campus</a></li>
                                        @else
                                            <li><a href="{{url('adm/crear/cc')}}">Crear campus</a></li>
                                        @endif

                                        @if($_SERVER['REQUEST_URI'] == "/adm/crear/Facult" || $_SERVER['REQUEST_URI'] == "/adm/crear/Facults")
                                            <li class="active"><a href="{{url('adm/crear/Facult')}}">Crear Facultad(es)</a></li>
                                        @else
                                            <li><a href="{{url('adm/crear/Facult')}}">Crear Facultad(es)</a></li>
                                        @endif

                                        @if($_SERVER['REQUEST_URI'] == "/adm/crear/Depto" || $_SERVER['REQUEST_URI'] == "/adm/crear/Deptos")
                                            <li class="active"><a href="{{url('adm/crear/Depto')}}">Crear Depto</a></li>
                                        @else
                                            <li><a href="{{url('adm/crear/Depto')}}">Crear Depto</a></li>
                                        @endif

                                        @if($_SERVER['REQUEST_URI'] == "/adm/crear/Escuela")
                                            <li class="active"><a href="{{url('adm/crear/Escuela')}}">Crear Escuela(s)</a></li>
                                        @else
                                            <li><a href="{{url('adm/crear/Escuela')}}">Crear Escuela(s)</a></li>
                                        @endif

                                        @if($_SERVER['REQUEST_URI'] == "/adm/crear/aec")
                                            <li class="active"><a href="{{url('adm/crear/aec')}}">Asignar encargado a campus</a></li>
                                        @else
                                            <li><a href="{{url('adm/crear/aec')}}">Asignar encargado a campus</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        @yield('crear')
                    </div>
				@endif



				<!--	MENU PARA MODIFICAR	-->
				@if($_SERVER['REQUEST_URI'] == "/adm/modif" || $_SERVER['REQUEST_URI'] == "/adm/modif/perfuser" || $_SERVER['REQUEST_URI'] == "/adm/modif/camp" || $_SERVER['REQUEST_URI'] == "/adm/modif/encamp")
                <div class="col-md-2 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav nav-tabs">
                                        @if($_SERVER['REQUEST_URI'] == "/adm/modif/perfuser")
                                            <li class="active"><a href="{{url('adm/modif/perfuser')}}">Modificar perfiles de usuarios</a></li>
                                        @else
                                            <li><a href="{{url('adm/modif/perfuser')}}">Modificar perfiles de usuarios</a></li>
                                        @endif

                                        @if($_SERVER['REQUEST_URI'] == "/adm/modif/camp")
                                            <li class="active"><a href="{{url('adm/modif/camp')}}">Modificar campus</a></li>
                                        @else
                                            <li><a href="{{url('adm/modif/camp')}}">Modificar campus</a></li>
                                        @endif

                                        @if($_SERVER['REQUEST_URI'] == "/adm/modif/encamp")
                                            <li class="active"><a href="{{url('/adm/modif/encamp')}}">Modificar encargado a campus</a></li>
                                        @else
                                            <li><a href="{{url('/adm/modif/encamp')}}">Modificar encargado a campus</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
				  	    @yield('modificar')
                    </div>
				@endif

				<!--	MENU PARA ARCHIVAR	-->
				@if($_SERVER['REQUEST_URI'] == "/adm/archivar")
				@endif

</div>

@endsection