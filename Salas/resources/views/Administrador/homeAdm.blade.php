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
                        <li>{!!Html::linkRoute('Admin.Carrera.index','Carrera')!!}</li>
                        <li>{!!Html::linkRoute('Admin.TpoSala.index','Tipos de sala')!!}</li>
                        <li>{!!Html::linkRoute('Admin.Salas.index','Salas')!!}</li>
                        <li>{!!Html::linkRoute('Admin.User.index','Usuarios')!!}</li>
                        <li>{!!Html::linkRoute('Admin.Roluser.index','Asignar roles a usuarios')!!}</li>
                </div>
            </div>

        </div>
        <div class="col-md-9">
            {{$_SERVER['REQUEST_URI']}}
            @if($_SERVER['REQUEST_URI'] ==  "/Admin/Carrera"  || $_SERVER['REQUEST_URI'] ==  "/Admin/User"  || $_SERVER['REQUEST_URI'] == "/Admin/Roluser" || $_SERVER['REQUEST_URI'] == "/Admin/Salas" || $_SERVER['REQUEST_URI'] == "/Admin/TpoSala" || $_SERVER['REQUEST_URI'] == "/Admin/Escuela" || $_SERVER['REQUEST_URI'] == "/Admin/Depto" || $_SERVER['REQUEST_URI'] == "/Admin/Campus" || $_SERVER['REQUEST_URI'] == "/Admin/Facultad")
                @yield('body')
            @elseif(strpos($_SERVER['REQUEST_URI'],'/create') !== false)
                @yield('createBody')
            @elseif(strpos($_SERVER['REQUEST_URI'],'/edit') !== false)
                @yield('editBody')
            @elseif($_SERVER['REQUEST_URI']=="/Admin/home")
                {{--@if(Auth::user()->nombres == null)--}}
                @if(false)
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
                                    {!! Form::model(null,array('route' => array('Admin.home.update',Auth::user()->rut), 'method' => 'put')) !!}
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