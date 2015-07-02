@extends('Administrador.header')

@section('content')
<div class="row">
	<!--<div class="col-md-10 col-md-offset-1">-->



				@if($_SERVER['REQUEST_URI'] == "/adm")
						Bienvenido admnistrador, en esta pagina usted podra ..............................
				@endif

				<!--	MENU PARA CREAR	-->
				@if($_SERVER['REQUEST_URI'] == "/adm/create" || $_SERVER['REQUEST_URI'] == "/adm/Campus")
                    <div class="col-md-2 col-md-offset-1">
                        <div class="panel panel-info">
                            <div class="panel-heading">Menú</div>
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

                                        @if($_SERVER['REQUEST_URI'] == "/adm/Campus")
                                            <li class="active"><a href="{{url('/adm/Campus')}}">Crear campus</a></li>
                                        @else
                                            <li><a href="{{url('/adm/Campus')}}">Crear campus</a></li>
                                        @endif

                                        @if($_SERVER['REQUEST_URI'] == "/adm/crear/Facult" || $_SERVER['REQUEST_URI'] == "/adm/crear/Facults")
                                            <li class="active"><a href="{{url('adm/crear/Facult')}}">Crear Facultad(es)</a></li>
                                        @else
                                            <li><a href="{{url('adm/crear/Facult')}}">Crear Facultad(es)</a></li>
                                        @endif

                                        @if($_SERVER['REQUEST_URI'] == "/adm/crear/Depto" || $_SERVER['REQUEST_URI'] == "/adm/crear/Deptos")
                                            <li class="active"><a href="{{url('adm/crear/Depto')}}">Crear Departamento(s)</a></li>
                                        @else
                                            <li><a href="{{url('adm/crear/Depto')}}">Crear Departamento(s)</a></li>
                                        @endif

                                        @if($_SERVER['REQUEST_URI'] == "/adm/crear/Escuelas" || $_SERVER['REQUEST_URI'] == "/adm/crear/Escuela")
                                            <li class="active"><a href="{{url('adm/crear/Escuela')}}">Crear Escuela(s)</a></li>
                                        @else
                                            <li><a href="{{url('adm/crear/Escuela')}}">Crear Escuela(s)</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($_SERVER['REQUEST_URI'] == "/adm/crear")
                        <div class="col-md-8">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    Bienvenido a la seccion Crear
                                </div>
                                <div class="panel-body">
                                    <p align="justify">
                                        En esta seccion usted podra menejarse en el menu que tiene al a izquierda de su pantalla en donde se destaca
                                        <br/>
                                    </p>
                                    <ul>
                                        <li><b>Asignar perfiles a usuarios</b>
                                            <dd><p align="justify"></p></dd>
                                            <ul>
                                                <li><b>masiva</b></li>
                                                <li><b>individual</b></li>
                                            </ul>
                                        </li>

                                        <li><b>Crear Campus</b></li>
                                            <dd><p align="justify">Usted podra crear un Campus con su respectivo nombre, direccion, latitud, longitud y descripcion y al a vez asignarselo a un encargado.</p></dd>
                                        <li><b>Crear Facultad(es)</b></li>
                                            <dd><p align="justify">Usted Podra crear una o muchas Facultades en un Campus seleccionado, le podria asignar tanto un nombre como una descripcion.</p></dd>
                                        <li><b>Crear Departamento(s)</b></li>
                                            <dd><p align="justify">Usted Podra crear uno o muchos Departamentos en una Facultad seleccionada, le podria asignar tanto un nombre como una descripcion.</p></dd>
                                        <li><b>Crear Escuela(s)</b></li>
                                            <dd><p align="justify">Usted Podra crear una o muchas Escuelas en un Departamento seleccionado, le podria asignar tanto un nombre como una descripcion.</p></dd>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-8">
                        @yield('crear')
                    </div>

				@endif



				<!--	MENU PARA MODIFICAR	-->
				@if($_SERVER['REQUEST_URI'] == "/adm/modif/Escuelas" || $_SERVER['REQUEST_URI'] == "/adm/modif/Deptos" || $_SERVER['REQUEST_URI'] == "/adm/modif/Facultads" || $_SERVER['REQUEST_URI'] == "/adm/modif/camps" || $_SERVER['REQUEST_URI'] == "/adm/modif/Escuela" || $_SERVER['REQUEST_URI'] == "/adm/modif/Depto" || $_SERVER['REQUEST_URI'] == "/adm/modif/Facultad" || $_SERVER['REQUEST_URI'] == "/adm/modif" || $_SERVER['REQUEST_URI'] == "/adm/modif/perfuser" || $_SERVER['REQUEST_URI'] == "/adm/modif/camp" || $_SERVER['REQUEST_URI'] == "/adm/modif/encamp")
                    <div class="col-md-2 col-md-offset-1">
                        <div class="panel panel-info">
                            <div class="panel-heading">Menú</div>
                                <div class="panel-body">
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav nav-tabs">
                                            @if($_SERVER['REQUEST_URI'] == "/adm/modif/perfuser")
                                                <li class="active"><a href="{{url('adm/modif/perfuser')}}">Modificar perfiles de usuarios</a></li>
                                            @else
                                                <li><a href="{{url('adm/modif/perfuser')}}">Modificar perfiles de usuarios</a></li>
                                            @endif

                                            @if($_SERVER['REQUEST_URI'] == "/adm/modif/camps" || $_SERVER['REQUEST_URI'] == "/adm/modif/camp")
                                                <li class="active"><a href="{{url('adm/modif/camp')}}">Modificar campus</a></li>
                                            @else
                                                <li><a href="{{url('adm/modif/camp')}}">Modificar campus</a></li>
                                            @endif

                                            @if($_SERVER['REQUEST_URI'] == "/adm/modif/Facultads" || $_SERVER['REQUEST_URI'] == "/adm/modif/Facultad")
                                                <li class="active"><a href="{{url('adm/modif/Facultad')}}">Modificar Facultad</a></li>
                                            @else
                                                <li><a href="{{url('adm/modif/Facultad')}}">Modificar Facultad</a></li>
                                            @endif

                                            @if($_SERVER['REQUEST_URI'] == "/adm/modif/Deptos" || $_SERVER['REQUEST_URI'] == "/adm/modif/Depto")
                                                <li class="active"><a href="{{url('adm/modif/Depto')}}">Modificar Departamento</a></li>
                                            @else
                                                <li><a href="{{url('adm/modif/Depto')}}">Modificar Departamento</a></li>
                                            @endif

                                            @if($_SERVER['REQUEST_URI'] == "/adm/modif/Escuelas" || $_SERVER['REQUEST_URI'] == "/adm/modif/Escuela")
                                                <li class="active"><a href="{{url('adm/modif/Escuela')}}">Modificar Escuela</a></li>
                                            @else
                                                <li><a href="{{url('adm/modif/Escuela')}}">Modificar Escuela</a></li>
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
                    @if($_SERVER['REQUEST_URI'] == "/adm/modif")
                    <div class="col-md-8">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                Bienvenido a la seccion Modificar
                            </div>
                            <div class="panel-body">
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-md-8">
				  	    @yield('modificar')
                    </div>
				@endif

				<!--	MENU PARA ARCHIVAR	-->
				@if($_SERVER['REQUEST_URI'] == "/adm/Exportar")
				@endif

</div>

@endsection