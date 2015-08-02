@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Salas
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
                        <div class="col-md-3 col-md-offset-8">
                            <nav class="navbar navbar-right">
                                <a class="btn glyphicon glyphicon-plus" href="/Admin/Salas/create" role="button" aria-label="Left Align">Crear salas</a>
                            </nav>
                        </div>
                    </div>
                    {!!Form::open(['route'=>'Admin.Salas.index','method'=>'GET','class'=>'navbar-form navbar-right pull-right'])!!}
                        {!!Form::text('Salas',null,['class'=>'form-control','placeholder'=>'Nombre Sala'])!!}
                        {!!Form::button('Buscar',['class' => 'btn btn-default','type' => 'submit'])!!}
                    {!!Form::close()!!}
                    {!!Html::linkRoute('Admin.Salas.index','Mostrar todo',null,['class'=>'btn btn-default','role'=>'button'])!!}
                    @if(count($Salas) > 0)
                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <tr>
                                <th class="center">Nombre sala</th>
                                <th class="center">Capacidad</th>
                                <th class="center">Campus</th>
                                <th class="center">Tpo Sala</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>
                                <th class="center">Descargar</th>
                            </tr>
                            @foreach($Salas as $Sala)
                                <tr>
                                    <th class="center">{{$Sala->nombre}}</th>
                                    <th class="center">{{$Sala->capacidad}}</th>
                                    <th class="center">{{$Sala->campus->nombre}}</th>
                                    <th class="center">{{$Sala->tipo_sala->nombre}}</th>
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
                        </table>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <nav class="navbar navbar-right">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr><th class="center">Descargar Campus</th></tr>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/salall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                    </table>
                                </nav>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="alert alert-info">
                                    <strong>Execelente!</strong><br><br>
                                    <ul>
                                        <li>No hay salas ingresadas</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
@endsection