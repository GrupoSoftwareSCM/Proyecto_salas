@extends('Docente.header')

@section('content') <!-- EN ESTA SECCION VAMOS A MOSTRAR UNA BARRA LATERAL IZQUIERDA -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
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
                    <a class="navbar-brand" href="#">Logotipo</a>
                </div>

                <!-- Agrupar los enlaces de navegación, los formularios y cualquier
                     otro elemento que se pueda ocultar al minimizar la barra -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Ramos<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <?php $cursos = \App\Models\Docente::where('rut',Auth::user()->rut)->first()->curso ?>
                                @foreach($cursos as $curso)
                                    {{--PARA PODER VER LOS CURSOS, VAMOS A CREAR UNA FUNCION PARECIDA A LA AGREGAR
                                    MASIVAMENTE, EN DONDE ESTA VA A A RESIVIR EL ID DEL CURSO Y VA CONSULTAR POR ESTE--}}
                                    <li>{!!Html::linkRoute('Docente.Asignatura.show',$curso->nombre,[$curso->id])!!}</li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Solicitud<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Cambiar de perfil<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                {{--dd(Auth::user()->roles)--}}
                                @foreach(Auth::user()->roles as $perfiles)
                                    @if($perfiles->nombre == 'ADMINISTRADOR')
                                        <li>{!!Html::linkRoute('Admin.home.index','Administrador')!!}</li>
                                    @elseif($perfiles->nombre == 'ENCARGADO_CAMPUS')
                                        <li>{!!Html::linkRoute('encar.home.index','Encargado Campus')!!}</li>
                                    @elseif($perfiles->nombre == 'ESTUDIANTE')
                                        <li>{!!Html::linkRoute('estu.home.index','Estudiante')!!}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li>consultas especificas</li>
                    </ul>
                </div>

            </nav>

        </div>
        <div class="col-md-9">
            {{$_SERVER['REQUEST_URI']}}
            @if(false)
                @yield('body')
            @elseif($_SERVER['REQUEST_URI']=="/Docente/home")
                @if(Auth::user()->nombres == null)
                    <div class="panel panel-success">
                        <div class="panel-body">
                            home
                            <a class="glyphicon glyphicon-menu-right"></a>
                            Datos Personales
                        </div>
                        <div class="panel-footer">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>OOoops!</strong> Hubo algunos problemas con su entrada.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::model(null,array('route' => array('Docente.home.update',Auth::user()->rut), 'method' => 'put')) !!}
                                    <div class="form-group">

                                        {!!Form::label('nombres','Nombres',['class' => 'col-md-6'])!!}
                                        {!!Form::text('nombres',null,['class' => 'col-md-6'])!!}

                                        {!!Form::label('apellidos','Apellidos',['class' => 'col-md-6'])!!}
                                        {!!Form::text('apellidos',null,['class' => 'col-md-6'])!!}

                                        {!!Form::label('email','E-mail',['class' => 'col-md-6'])!!}
                                        {!!Form::text('email',null,['class' => 'col-md-6'])!!}

                                    </div>
                                    {!!Form::button('Enviar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                                    {!!Form::close()!!}
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="panel panel-success">
                        <div class="panel-body">
                            home
                            <a class="glyphicon glyphicon-menu-right"></a>
                            Bienvenida
                        </div>
                        <div class="panel-footer">
                            te damos la bienvenida
                        </div>
                    </div>
                @endif

            @endif

        </div>
    </div>
</div>

@endsection