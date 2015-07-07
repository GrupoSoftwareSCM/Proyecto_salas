@extends('Administrador.homeAdm')

@section('body')
    @if($_SERVER['REQUEST_URI'] == "/Admin/Campus")

        <div class="panel panel-success">
            <div class="panel-body">
                Campus
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">



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

                                    </tr>

                                    </thead>
                                    <tbody>

                                        @foreach($campus as $camp)
                                            <tr>
                                                <th class="center">{{$camp->nombre}}</th>
                                                <th class="center">{{$camp->direccion}}</th>
                                                <th class="center">
                                                    <a class="btn glyphicon glyphicon-pencil" href="Campus/{{$camp->id_campus}}/edit" role="button" aria-label="Left Align"></a>
                                                </th>
                                                <th class="center">
                                                    {!!Form::open(array('route' => array('Admin.Campus.destroy',$camp->id_campus), 'method' => 'DELETE'))!!}

                                                        <button class="glyphicon glyphicon-remove" type="submit">
                                                        </button>

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

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Facultad")

        <div class="panel panel-success">
            <div class="panel-body">
                Facultades
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

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($facultades as $facultad)
                                <tr>
                                    <th class="center">{{$facultad->nombre}}</th>
                                    <th class="center">{{$facultad->descripcion}}</th>
                                    <th class="center">{{$facultad->campus_id}}</th>
                                    <th class="center">
                                        <a class="btn glyphicon glyphicon-pencil" href="Facultad/{{$facultad->id_facultades}}/edit" role="button" aria-label="Left Align"></a>
                                    </th>
                                    <th class="center">
                                        {!!Form::open(array('route' => array('Admin.Facultad.destroy',$facultad->id_facultades), 'method' => 'DELETE'))!!}

                                        <button class="btn glyphicon glyphicon-remove" type="submit"></button>
                                        <!--<a class="btn glyphicon glyphicon-remove" href="Admin/Facultad/{{$facultad->id_facultades}}" role="button"></a>-->

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

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($Departamentos as $Departamento)
                                <tr>
                                    <th class="center">{{$Departamento->nombre}}</th>
                                    <th class="center">{{$Departamento->descripcion}}</th>
                                    <th class="center">{{$Departamento->facultad_id}}</th>
                                    <th class="center">
                                        <a class="btn glyphicon glyphicon-pencil" href="Depto/{{$Departamento->id_departamentos}}/edit" role="button" aria-label="Left Align"></a>
                                    </th>
                                    <th class="center">
                                        {!!Form::open(array('route' => array('Admin.Depto.destroy',$Departamento->id_departamentos), 'method' => 'DELETE'))!!}

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
                                <th class="center">Departamentos perteneciente</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($Escuelas as $Escuela)
                                <tr>
                                    <th class="center">{{$Escuela->nombre}}</th>
                                    <th class="center">{{$Escuela->descripcion}}</th>
                                    <th class="center">{{$Escuela->departamento_id}}</th>
                                    <th class="center">
                                        <a class="btn glyphicon glyphicon-pencil" href="Escuela/{{$Escuela->id_escuelas}}/edit" role="button" aria-label="Left Align"></a>
                                    </th>
                                    <th class="center">
                                        {!!Form::open(array('route' => array('Admin.Escuela.destroy',$Escuela->id_escuelas), 'method' => 'DELETE'))!!}

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

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($Tposalas as $Tposala)
                                <tr>
                                    <th class="center">{{$Tposala->nombre}}</th>
                                    <th class="center">{{$Tposala->descripcion}}</th>
                                    <th class="center">
                                        <a class="btn glyphicon glyphicon-pencil" href="TpoSala/{{$Tposala->id_tipos_salas}}/edit" role="button" aria-label="Left Align"></a>
                                    </th>
                                    <th class="center">
                                        {!!Form::open(array('route' => array('Admin.TpoSala.destroy',$Tposala->id_tipos_salas), 'method' => 'DELETE'))!!}

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

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Salas")
        {{--var_dump($Campus)--}}

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
                                <th class="center">Nombre</th>
                                <th class="center">Descripcion</th>
                                <th class="center">Campus</th>
                                <th class="center">Tpo Sala</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($Salas as $Sala)
                                <tr>
                                    <th class="center">{{$Sala->nombre}}</th>
                                    <th class="center">{{$Sala->descripcion}}</th>
                                    <th class="center">{{$Sala->campus_id}}</th>
                                    <th class="center">{{$Sala->tipo_sala_id}}</th>
                                    <th class="center">
                                        <a class="btn glyphicon glyphicon-pencil" href="Salas/{{$Sala->id_salas}}/edit" role="button" aria-label="Left Align"></a>
                                    </th>
                                    <th class="center">
                                        {!!Form::open(array('route' => array('Admin.Salas.destroy',$Sala->id_salas), 'method' => 'DELETE'))!!}

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