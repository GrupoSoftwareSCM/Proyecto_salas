@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Departamento
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
                    <div class="row">
                        <nav class="navbar navbar-right">
                            <a class="btn glyphicon glyphicon-plus" href="/Admin/Depto/create" role="button" aria-label="Left Align">
                                Crear Departamento
                            </a>
                        </nav>
                    </div>
                    {!!Form::open(['route'=>'Admin.Depto.index','method'=>'GET','class'=>'navbar-form navbar-right pull-right'])!!}
                    {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre de Departamento'])!!}
                    {!!Form::select('facultad',$Facultad,null,['class'=>'form-control'])!!}
                    {!!Form::button('Buscar',['class' => 'btn btn-default','type' => 'submit'])!!}
                    {!!Form::close()!!}
                    {!!Html::linkRoute('Admin.Depto.index','Mostrar todo',[],['class'=>'btn btn-default','role'=>'button'])!!}

                    @if(count($Departamentos)>0)
                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <tr>
                                <th class="center">Nombre</th>
                                <th class="center">Descripcion</th>
                                <th class="center">Facultad perteneciente</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>
                                <th class="center">Descargar</th>

                            </tr>
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
                                {!! $Departamentos->render() !!}
                        </table>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <nav class="navbar navbar-right">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <tr><th class="center">Descargar Campus</th></tr>
                                        <tbody>
                                        <tr><th class="center">
                                                {!!Html::link('files/departamentoall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                    </table>
                                </nav>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info">
                            <strong>Execelente!</strong><br><br>
                            <ul>
                                <li>No hay Departamento(s) registrado(s)</li>
                            </ul>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
@endsection