@extends('Administrador.homeAdm')

@section('body')
    @if($_SERVER['REQUEST_URI'] == "/Admin/Campus")

        <div class="panel panel-success">
            <div class="panel-body">
                Campus
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <nav class="navbar navbar-right">
                            <a class="btn glyphicon glyphicon-plus" href="/Admin/Campus/create" role="button" aria-label="Left Align">
                                Crear Campus
                            </a>
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
                    <div class="col-md-8 col-md-offset-2">

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

                                        <button class="btn glyphicon glyphicon-remove" type="submit"></button>

                                        {!!Form::close()!!}
                                    </th>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection