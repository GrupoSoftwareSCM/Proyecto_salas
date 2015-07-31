@extends('Administrador.homeAdm')

@section('body')
    @if($_SERVER['REQUEST_URI'] == "/Admin/Campus")
        <div class="panel panel-success">
            <div class="panel-body">
                Campus
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mensaje">
                            @if(Session::has('message'))
                                <div class="alert alert-info">
                                    <strong>Execelente!</strong><br><br>
                                    <ul>
                                        <li>{{ Session::get('message') }}</li>
                                    </ul>
                                </div>
                            @elseif(Session::has('destroy'))
                                <div class="alert alert-danger">
                                    <strong>Tus deseos son ordenes!</strong><br><br>
                                    <ul>
                                        <li>{{ Session::get('destroy') }}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <nav class="navbar navbar-right">
                            <a class="btn glyphicon glyphicon-plus" href="/Admin/Campus/create" role="button" aria-label="Left Align">Crear Campus</a>
                        </nav>
                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="center">Nombre</th>
                                    <th class="center">Direccion</th>
                                    <th class="center">Editar</th>
                                    <th class="center">Eliminar</th>
                                    <th class="center">+ info</th>
                                    <th class="center">Descargar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($campus as $camp)
                                    <tr>
                                        <th class="center">{{$camp->nombre}}</th>
                                        <th class="center">{{$camp->direccion}}</th>
                                        <th class="center">
                                            <a class="btn glyphicon glyphicon-pencil" href="Campus/{{$camp->id}}/edit" role="button" aria-label="Left Align"></a>
                                        </th>
                                        <th class="center">
                                            {!!Form::open(array('route' => array('Admin.Campus.destroy',$camp->id), 'method' => 'DELETE'))!!}

                                                <button class="glyphicon glyphicon-remove" type="submit">
                                                </button>

                                            {!!Form::close()!!}
                                        </th>
                                        <th class="center">
                                            {!!Html::link('bajar/campus/'.$camp->id,'',['class' => 'btn glyphicon glyphicon-inbox', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                        </th>
                                        <th class="center">
                                            {!!Html::link('files/campus/'.$camp->id,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <nav class="navbar navbar-right">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="center">Descargar Campus</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/campusall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Facultad")
        <div class="panel panel-success">
            <div class="panel-body">
                Facultad
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mensaje">
                            @if(Session::has('message'))
                                <div class="alert alert-info">
                                    <strong>Execelente!</strong><br><br>
                                    <ul>
                                        <li>{{ Session::get('message') }}</li>
                                    </ul>
                                </div>
                            @elseif(Session::has('destroy'))
                                <div class="alert alert-danger">
                                    <strong>Tus deseos son ordenes!</strong><br><br>
                                    <ul>
                                        <li>{{ Session::get('destroy') }}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <nav class="navbar navbar-right">
                            <a class="btn glyphicon glyphicon-plus" href="/Admin/Facultad/create" role="button" aria-label="Left Align">
                                Crear Facultad
                            </a>
                        </nav>

                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="center">Nombre</th>
                                <th class="center">Descripcion</th>
                                <th class="center">Campus perteneciente</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>
                                <th class="center">Descargar</th>

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($facultades as $facultad)
                                <tr>
                                    <th class="center">{{$facultad->nombre}}</th>
                                    <th class="center">{{$facultad->descripcion}}</th>
                                    @foreach($Campus as $key => $value)
                                        @if($key == $facultad->campus_id)
                                            <th class="center">{{$value}}</th>
                                        @endif
                                    @endforeach
                                    <th class="center">
                                        <a class="btn glyphicon glyphicon-pencil" href="Facultad/{{$facultad->id}}/edit" role="button" aria-label="Left Align"></a>
                                    </th>
                                    <th class="center">
                                        {!!Form::open(array('route' => array('Admin.Facultad.destroy',$facultad->id), 'method' => 'DELETE'))!!}

                                        <button class="btn glyphicon glyphicon-remove" type="submit"></button>

                                        {!!Form::close()!!}
                                    </th>
                                    <th class="center">
                                        {!!Html::link('files/facultad/'.$facultad->id,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}

                                    </th>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <nav class="navbar navbar-right">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="center">Descargar Campus</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/facultadall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </nav>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Depto")
        <div class="panel panel-success">
            <div class="panel-body">
                Departamento
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <nav class="navbar navbar-right">
                            <a class="btn glyphicon glyphicon-plus" href="/Admin/Depto/create" role="button" aria-label="Left Align">
                                Crear Departamento
                            </a>
                        </nav>

                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="center">Nombre</th>
                                <th class="center">Descripcion</th>
                                <th class="center">Facultad perteneciente</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>
                                <th class="center">Descargar</th>

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($Departamentos as $Departamento)
                                <tr>
                                    <th class="center">{{$Departamento->nombre}}</th>
                                    <th class="center">{{$Departamento->descripcion}}</th>
                                    @foreach($Facultad as $key => $value)
                                        @if($key == $Departamento->facultad_id)
                                            <th class="center">{{$value}}</th>
                                        @endif
                                    @endforeach
                                    <th class="center">
                                        <a class="btn glyphicon glyphicon-pencil" href="Depto/{{$Departamento->id}}/edit" role="button" aria-label="Left Align"></a>
                                    </th>
                                    <th class="center">
                                        {!!Form::open(array('route' => array('Admin.Depto.destroy',$Departamento->id), 'method' => 'DELETE'))!!}

                                        <button class="btn glyphicon glyphicon-remove" type="submit"></button>

                                        {!!Form::close()!!}
                                    </th>
                                    <th>
                                        {!!Html::link('files/departamento/'.$Departamento->id,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                    </th>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <nav class="navbar navbar-right">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="center">Descargar Campus</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/departamentoall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </nav>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Escuela")

        <div class="panel panel-success">
            <div class="panel-body">
                Escuela
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <nav class="navbar navbar-right">
                            <a class="btn glyphicon glyphicon-plus" href="/Admin/Escuela/create" role="button" aria-label="Left Align">
                                Crear Escuela
                            </a>
                        </nav>

                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="center">Nombre</th>
                                <th class="center">Descripcion</th>
                                <th class="center">Departamento perteneciente</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>
                                <th class="center">Descargar</th>

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($Escuelas as $Escuela)
                                <tr>
                                    <th class="center">{{$Escuela->nombre}}</th>
                                    <th class="center">{{$Escuela->descripcion}}</th>

                                    @foreach($Depto as $key => $value)
                                        @if($key == $Escuela->departamento_id)
                                            <th class="center">{{$value}}</th>
                                        @endif
                                    @endforeach

                                    <th class="center">
                                        <a class="btn glyphicon glyphicon-pencil" href="Escuela/{{$Escuela->id}}/edit" role="button" aria-label="Left Align"></a>
                                    </th>
                                    <th class="center">
                                        {!!Form::open(array('route' => array('Admin.Escuela.destroy',$Escuela->id), 'method' => 'DELETE'))!!}

                                        <button class="btn glyphicon glyphicon-remove" type="submit"></button>

                                        {!!Form::close()!!}
                                    </th>
                                    <th class="center">
                                        {!!Html::link('files/escuela/'.$Escuela->id,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                    </th>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <nav class="navbar navbar-right">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="center">Descargar Campus</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/escuelall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </nav>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/TpoSala")

        <div class="panel panel-success">
            <div class="panel-body">
                Tipo sala
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <nav class="navbar navbar-right">
                            <a class="btn glyphicon glyphicon-plus" href="/Admin/TpoSala/create" role="button" aria-label="Left Align">
                                Crear Tipo de sala
                            </a>
                        </nav>

                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="center">Nombre</th>
                                <th class="center">Descripcion</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>
                                <th class="center">Descargar</th>

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($Tposalas as $Tposala)
                                <tr>
                                    <th class="center">{{$Tposala->nombre}}</th>
                                    <th class="center">{{$Tposala->descripcion}}</th>
                                    <th class="center">
                                        <a class="btn glyphicon glyphicon-pencil" href="TpoSala/{{$Tposala->id}}/edit" role="button" aria-label="Left Align"></a>
                                    </th>
                                    <th class="center">
                                        {!!Form::open(array('route' => array('Admin.TpoSala.destroy',$Tposala->id), 'method' => 'DELETE'))!!}

                                        <button class="btn glyphicon glyphicon-remove" type="submit"></button>

                                        {!!Form::close()!!}
                                    </th>
                                    <th class="center">
                                        {!!Html::link('files/tposala/'.$Tposala->id,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                    </th>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <nav class="navbar navbar-right">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="center">Descargar Campus</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/tposalall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </nav>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Salas")

        <div class="panel panel-success">
            <div class="panel-body">
                Salas
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <nav class="navbar navbar-right">
                            <a class="btn glyphicon glyphicon-plus" href="/Admin/Salas/create" role="button" aria-label="Left Align">
                                Crear salas
                            </a>
                        </nav>

                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="center">Nombre sala</th>
                                <th class="center">Capacidad</th>
                                <th class="center">Campus</th>
                                <th class="center">Tpo Sala</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>
                                <th class="center">Descargar</th>

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($Salas as $Sala)
                                <tr>
                                    <th class="center">{{$Sala->nombre}}</th>
                                    <th class="center">{{$Sala->capacidad}}</th>

                                    @foreach($Campus as $key => $camp)
                                        @if($key == $Sala->campus_id)
                                            <th class="center">{{$camp}}</th>
                                        @endif
                                    @endforeach

                                    @foreach($Tposala as $key => $value)
                                        @if($key == $Sala->tipo_sala_id)
                                            <th class="center">{{$value}}</th>
                                        @endif
                                    @endforeach
                                    <th class="center">
                                        <a class="btn glyphicon glyphicon-pencil" href="Salas/{{$Sala->id}}/edit" role="button" aria-label="Left Align"></a>
                                    </th>
                                    <th class="center">
                                        {!!Form::open(array('route' => array('Admin.Salas.destroy',$Sala->id), 'method' => 'DELETE'))!!}

                                        <button class="btn glyphicon glyphicon-remove" type="submit"></button>

                                        {!!Form::close()!!}
                                    </th>
                                    <th class="center">
                                        {!!Html::link('files/sala/'.$Sala->id,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                    </th>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>


                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <nav class="navbar navbar-right">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="center">Descargar Campus</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/salall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </nav>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Roluser")
        <div class="panel panel-success">
            <div class="panel-body">
                Asignar Roles
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <nav class="navbar navbar-right">
                            <a class="btn glyphicon glyphicon-plus" href="/Admin/Roluser/create" role="button" aria-label="Left Align">
                                Asignar Roles
                            </a>
                        </nav>

                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="center">Nombres</th>
                                <th class="center">RUT</th>
                                <th class="center">Rol</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>
                                <th class="center">Descargar</th>

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($Roluser as $roles)
                                <tr>
                                    <th class="center">{{$roles->apellidos.', '.$roles->nombres}}</th>
                                    <th class="center">{{$roles->rut}}</th>
                                    <th class="center">{{$roles->nombre}}</th>
                                    <th class="center">
                                        <a class="btn glyphicon glyphicon-pencil" href="Roluser/{{$roles->id}}/edit" role="button" aria-label="Left Align"></a>
                                    </th>
                                    <th class="center">
                                        {!!Form::open(array('route' => array('Admin.Roluser.destroy',$roles->id), 'method' => 'DELETE'))!!}
                                            {!!Form::button(null,['class'=>'btn glyphicon glyphicon-remove', 'type'=>'submit'])!!}
                                        {!!Form::close()!!}
                                    </th>
                                    <th class="center">
                                        {!!Html::link('files/roluser/'.$roles->id,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                    </th>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <nav class="navbar navbar-right">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="center">Descargar Roles Usuarios</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/roluserall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </nav>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>

    @elseif($_SERVER['REQUEST_URI'] ==  "/Admin/User")
        <div class="panel panel-success">
            <div class="panel-body">
                Usuario(s)
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <nav class="navbar navbar-right">

                            <a class="btn glyphicon glyphicon-plus" href="/Admin/User/create" role="button" aria-label="Left Align">
                                Crear Usuario
                            </a>
                        </nav>

                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="center">Nombres</th>
                                <th class="center">Apellidos</th>
                                <th class="center">RUT</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>
                                <th class="center">Descargar</th>

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($user as $usuario)
                                <tr>
                                    <th class="center">{{$usuario->nombres}}</th>
                                    <th class="center">{{$usuario->apellidos}}</th>
                                    <th class="center">{{$usuario->rut}}</th>
                                    <th class="center">{!!Html::link('Admin/User/'.$usuario->rut.'/edit','',['class'=>'btn glyphicon glyphicon-pencil','role'=>'button', 'aria-label'=>'Left Align'])!!}</th>
                                    <th class="center">
                                        {!!Form::open(array('route' => array('Admin.User.destroy',$usuario->rut), 'method' => 'DELETE'))!!}
                                            {!!Form::button(null,['class'=>'btn glyphicon glyphicon-remove', 'type'=>'submit'])!!}
                                        {!!Form::close()!!}
                                    </th>
                                    <th class="center">
                                        {!!Html::link('files/usuarios/'.$usuario->rut,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                    </th>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>


                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <nav class="navbar navbar-right">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="center">Descargar Usuario</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/usuarioall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </nav>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    @elseif($_SERVER['REQUEST_URI'] ==  "/Admin/Carrera")
        <div class="panel panel-success">
            <div class="panel-body">
                Carrera(s)
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mensaje">
                            @if(Session::has('message'))
                                <div class="alert alert-info">
                                    <strong>Execelente!</strong><br><br>
                                    <ul>
                                        <li>{{ Session::get('message') }}</li>
                                    </ul>
                                </div>
                            @elseif(Session::has('destroy'))
                                <div class="alert alert-danger">
                                    <strong>Tus deseos son ordenes!</strong><br><br>
                                    <ul>
                                        <li>{{ Session::get('destroy') }}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <nav class="navbar navbar-right">

                            <a class="btn glyphicon glyphicon-plus" href="/Admin/Carrera/create" role="button" aria-label="Left Align">
                                Crear Carrera
                            </a>
                        </nav>

                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="center">Nombres</th>
                                <th class="center">Codigo</th>
                                <th class="center">Escuela</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>
                                <th class="center">Descargar</th>

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($Carreras as $carrera)
                                <tr>
                                    <th class="center">{{$carrera->nombre}}</th>
                                    <th class="center">{{$carrera->codigo}}</th>
                                    <th class="center">{{$carrera->escuela->nombre}}</th>
                                    <th class="center">{!!Html::link('Admin/Carrera/'.$carrera->id.'/edit','',['class'=>'btn glyphicon glyphicon-pencil','role'=>'button', 'aria-label'=>'Left Align'])!!}</th>
                                    <th class="center">
                                        {!!Form::open(array('route' => array('Admin.Carrera.destroy',$carrera->id), 'method' => 'DELETE'))!!}
                                        {!!Form::button(null,['class'=>'btn glyphicon glyphicon-remove', 'type'=>'submit'])!!}
                                        {!!Form::close()!!}
                                    </th>
                                    <th class="center">
                                        {!!Html::link('files/carrera/'.$carrera->id,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                    </th>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>


                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <nav class="navbar navbar-right">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="center">Descargar Usuario</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/carrerall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </nav>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    @elseif($_SERVER['REQUEST_URI'] ==  "/Admin/Administrador")
        <div class="panel panel-success">
            <div class="panel-body">
                Administradores
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="mensaje">
                            @if(Session::has('message'))
                                <div class="alert alert-info">
                                    <strong>Execelente!</strong><br><br>
                                    <ul>
                                        <li>{{ Session::get('message') }}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <nav class="navbar navbar-right">

                            <a class="btn glyphicon glyphicon-plus" href="/Admin/Administrador/create" role="button" aria-label="Left Align">
                                Crear Administrador
                            </a>
                        </nav>

                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="center">Nombres</th>
                                <th class="center">RUT</th>
                                <th class="center">email</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>
                                <th class="center">Descargar</th>

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($Adminis as $Admin)
                                <tr>
                                    <th class="center">{{$Admin->apellidos.','.$Admin->nombres}}</th>
                                    <th class="center">{{$Admin->rut}}</th>
                                    <th class="center">{{$Admin->email}}</th>
                                    <th class="center">{!!Html::link('Admin/Administrador/'.$Admin->rut.'/edit','',['class'=>'btn glyphicon glyphicon-pencil','role'=>'button', 'aria-label'=>'Left Align'])!!}</th>
                                    <th class="center">
                                        {!!Form::open(array('route' => array('Admin.Administrador.destroy',$Admin->rut), 'method' => 'DELETE'))!!}
                                        {!!Form::button(null,['class'=>'btn glyphicon glyphicon-remove', 'type'=>'submit'])!!}
                                        {!!Form::close()!!}
                                    </th>
                                    <th class="center">
                                        {!!Html::link('files/administrador/'.$Admin->rut,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                    </th>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>


                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <nav class="navbar navbar-right">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="center">Descargar Usuario</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/administradorall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </nav>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    @elseif($_SERVER['REQUEST_URI'] ==  "/Admin/EncargadoCampus")
        <div class="panel panel-success">
            <div class="panel-body">
                Encargados de Campus
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="mensaje">
                            @if(Session::has('message'))
                                <div class="alert alert-info">
                                    <strong>Execelente!</strong><br><br>
                                    <ul>
                                        <li>{{ Session::get('message') }}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <nav class="navbar navbar-right">

                            <a class="btn glyphicon glyphicon-plus" href="/Admin/EncargadoCampus/create" role="button" aria-label="Left Align">
                                Crear Encargado Campus
                            </a>
                        </nav>

                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="center">Nombres</th>
                                <th class="center">RUT</th>
                                <th class="center">email</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>
                                <th class="center">Descargar</th>

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($Encargados as $encargado)
                                <tr>
                                    <th class="center">{{$encargado->apellidos.','.$encargado->nombres}}</th>
                                    <th class="center">{{$encargado->rut}}</th>
                                    <th class="center">{{$encargado->email}}</th>
                                    <th class="center">{!!Html::link('Admin/EncargadoCampus/'.$encargado->rut.'/edit','',['class'=>'btn glyphicon glyphicon-pencil','role'=>'button', 'aria-label'=>'Left Align'])!!}</th>
                                    <th class="center">
                                        {!!Form::open(array('route' => array('Admin.EncargadoCampus.destroy',$encargado->rut), 'method' => 'DELETE'))!!}
                                        {!!Form::button(null,['class'=>'btn glyphicon glyphicon-remove', 'type'=>'submit'])!!}
                                        {!!Form::close()!!}
                                    </th>
                                    <th class="center">
                                        {!!Html::link('files/administrador/'.$encargado->rut,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                    </th>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>


                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <nav class="navbar navbar-right">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="center">Descargar Usuario</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/administradorall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </nav>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    @elseif($_SERVER['REQUEST_URI'] ==  "/Admin/Estudiante")
        <div class="panel panel-success">
            <div class="panel-body">
                Estudiante
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mensaje">
                            @if(Session::has('message'))
                                <div class="alert alert-info">
                                    <strong>Execelente!</strong><br><br>
                                    <ul>
                                        <li>{{ Session::get('message') }}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <nav class="navbar navbar-right">

                            <a class="btn glyphicon glyphicon-plus" href="/Admin/Estudiante/create" role="button" aria-label="Left Align">
                                Crear Estudiante
                            </a>
                        </nav>

                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="center">Nombres</th>
                                <th class="center">RUT</th>
                                <th class="center">email</th>
                                <th class="center">Carrera</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>
                                <th class="center">Descargar</th>

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($Estudiantes as $estudiante)
                                <tr>
                                    <th class="center">{{$estudiante->apellidos.','.$estudiante->nombres}}</th>
                                    <th class="center">{{$estudiante->rut}}</th>
                                    <th class="center">{{$estudiante->email}}</th>
                                    <th class="center">{{$estudiante->carrera->nombre}}</th>
                                    <th class="center">{!!Html::link('Admin/Estudiante/'.$estudiante->id.'/edit','',['class'=>'btn glyphicon glyphicon-pencil','role'=>'button', 'aria-label'=>'Left Align'])!!}</th>
                                    <th class="center">
                                        {!!Form::open(array('route' => array('Admin.Estudiante.destroy',$estudiante->id), 'method' => 'DELETE'))!!}
                                        {!!Form::button(null,['class'=>'btn glyphicon glyphicon-remove', 'type'=>'submit'])!!}
                                        {!!Form::close()!!}
                                    </th>
                                    <th class="center">
                                        {!!Html::link('files/administrador/'.$estudiante->id,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                    </th>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>


                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <nav class="navbar navbar-right">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="center">Descargar Usuario</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/administradorall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </nav>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    @elseif($_SERVER['REQUEST_URI'] ==  "/Admin/Docente")
        <div class="panel panel-success">
            <div class="panel-body">
                Docente
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mensaje">
                            @if(Session::has('message'))
                                <div class="alert alert-info">
                                    <strong>Execelente!</strong><br><br>
                                    <ul>
                                        <li>{{ Session::get('message') }}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <nav class="navbar navbar-right">

                            <a class="btn glyphicon glyphicon-plus" href="/Admin/Docente/create" role="button" aria-label="Left Align">
                                Crear Docente
                            </a>
                        </nav>

                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="center">Nombres</th>
                                <th class="center">RUT</th>
                                <th class="center">email</th>
                                <th class="center">Departamento</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>
                                <th class="center">Descargar</th>

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($Docentes as $docente)
                                <tr>
                                    <th class="center">{{$docente->apellidos.','.$docente->nombres}}</th>
                                    <th class="center">{{$docente->rut}}</th>
                                    <th class="center">{{$docente->email}}</th>
                                    <th class="center">{{$docente->departamento->nombre}}</th>
                                    <th class="center">{!!Html::link('Admin/Docente/'.$docente->id.'/edit','',['class'=>'btn glyphicon glyphicon-pencil','role'=>'button', 'aria-label'=>'Left Align'])!!}</th>
                                    <th class="center">
                                        {!!Form::open(array('route' => array('Admin.Docente.destroy',$docente->id), 'method' => 'DELETE'))!!}
                                        {!!Form::button(null,['class'=>'btn glyphicon glyphicon-remove', 'type'=>'submit'])!!}
                                        {!!Form::close()!!}
                                    </th>
                                    <th class="center">
                                        {!!Html::link('files/administrador/'.$docente->id,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                    </th>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>


                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <nav class="navbar navbar-right">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="center">Descargar Usuario</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/administradorall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </nav>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    @elseif($_SERVER['REQUEST_URI'] ==  "/Admin/Funcionario")
        <div class="panel panel-success">
            <div class="panel-body">
                Funcionario
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mensaje">
                            @if(Session::has('message'))
                                <div class="alert alert-info">
                                    <strong>Execelente!</strong><br><br>
                                    <ul>
                                        <li>{{ Session::get('message') }}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <nav class="navbar navbar-right">

                            <a class="btn glyphicon glyphicon-plus" href="/Admin/Funcionario/create" role="button" aria-label="Left Align">
                                Crear Funcionario
                            </a>
                        </nav>

                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="center">Nombres</th>
                                <th class="center">RUT</th>
                                <th class="center">email</th>
                                <th class="center">Departamento</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>
                                <th class="center">Descargar</th>

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($Funcionarios as $funcionario)
                                <tr>
                                    <th class="center">{{$funcionario->apellidos.','.$funcionario->nombres}}</th>
                                    <th class="center">{{$funcionario->rut}}</th>
                                    <th class="center">{{$funcionario->email}}</th>
                                    <th class="center">{{$funcionario->departamento->nombre}}</th>
                                    <th class="center">{!!Html::link('Admin/Funcionario/'.$funcionario->id.'/edit','',['class'=>'btn glyphicon glyphicon-pencil','role'=>'button', 'aria-label'=>'Left Align'])!!}</th>
                                    <th class="center">
                                        {!!Form::open(array('route' => array('Admin.Funcionario.destroy',$funcionario->id), 'method' => 'DELETE'))!!}
                                        {!!Form::button(null,['class'=>'btn glyphicon glyphicon-remove', 'type'=>'submit'])!!}
                                        {!!Form::close()!!}
                                    </th>
                                    <th class="center">
                                        {!!Html::link('files/administrador/'.$funcionario->id,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                    </th>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>


                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <nav class="navbar navbar-right">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="center">Descargar Usuario</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/administradorall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </nav>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection