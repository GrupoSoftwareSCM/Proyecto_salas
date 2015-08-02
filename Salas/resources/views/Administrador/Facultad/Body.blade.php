@extends('Administrador.homeAdm')

@section('body')
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
                    <div class="row">
                        <div class="col-md-3 col-md-offset-8">
                            <nav class="navbar navbar-right">
                                <a class="btn glyphicon glyphicon-plus" href="/Admin/Facultad/create" role="button" aria-label="Left Align">Crear Facultad</a>
                            </nav>
                        </div>
                    </div>
                    {!!Form::open(['route'=>'Admin.Facultad.index','method'=>'GET','class'=>'navbar-form navbar-right pull-right'])!!}
                        {!!Form::text('Facultad',null,['class'=>'form-control','placeholder'=>'Nombre del Campus'])!!}
                        {!!Form::button('Buscar',['class' => 'btn btn-default','type' => 'submit'])!!}
                    {!!Form::close()!!}
                    {!!Html::linkRoute('Admin.Facultad.index','Mostrar todo',null,['class'=>'btn btn-default','role'=>'button'])!!}
                    @if(count($facultades)>0)
                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <tr>
                                <th class="center">Nombre</th>
                                <th class="center">Descripcion</th>
                                <th class="center">Campus perteneciente</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>
                                <th class="center">Descargar</th>
                            </tr>
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
                            {!! $facultades->render() !!}
                        </table>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <nav class="navbar navbar-right">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <tr><th class="center">Descargar Campus</th></tr>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/facultadall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                    </table>
                                </nav>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-8 col-md-offset-4">
                                <div class="alert alert-info">
                                    <strong>Execelente!</strong><br><br>
                                    <ul>
                                        <li>No hay Facultad(es) ingresada(s)</li>
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