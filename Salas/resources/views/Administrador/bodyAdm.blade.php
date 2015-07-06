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
                                        {!!Form::open(array('route' => array('Admin.Facultad.destroy',$Departamento->id_facultades), 'method' => 'DELETE'))!!}

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