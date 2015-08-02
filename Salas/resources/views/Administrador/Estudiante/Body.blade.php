@extends('Administrador.homeAdm')

@section('body')
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
                                <a class="btn glyphicon glyphicon-plus" href="/Admin/Estudiante/create" role="button" aria-label="Left Align">Crear Estudiante</a>
                            </nav>
                        </div>
                    </div>
                    {!!Form::open(['route'=>'Admin.Estudiante.index','method'=>'GET','class'=>'navbar-form navbar-right pull-right'])!!}
                        {!!Form::text('rut',null,['class'=>'form-control','placeholder'=>'RUT'])!!}
                        {!!Form::button('Buscar',['class' => 'btn btn-default','type' => 'submit'])!!}
                    {!!Form::close()!!}
                    {!!Html::linkRoute('Admin.Estudiante.index','Mostrar todo',null,['class'=>'btn btn-default','role'=>'button'])!!}
                    @if(count($Estudiantes) > 0)
                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <tr>
                                <th class="center">Nombres</th>
                                <th class="center">RUT</th>
                                <th class="center">email</th>
                                <th class="center">Carrera</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>
                                <th class="center">Descargar</th>
                            </tr>
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
                            {!! $Estudiantes->render() !!}
                        </table>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <nav class="navbar navbar-right">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <tr><th class="center">Descargar Usuario</th></tr>
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
                    @else
                        <div class="row">
                            <div class="col-md-8 col-md-offset-4">
                                <div class="alert alert-info">
                                    <strong>Execelente!</strong><br><br>
                                    <ul>
                                        <li>No hay Estudiante(s) ingresado(s)</li>
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