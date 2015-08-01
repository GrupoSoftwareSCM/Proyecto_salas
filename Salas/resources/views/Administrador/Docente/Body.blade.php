@extends('Administrador.homeAdm')

@section('body')
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

                    @if(count($Docentes)>0)
                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <tr>
                                <th class="center">Nombres</th>
                                <th class="center">RUT</th>
                                <th class="center">email</th>
                                <th class="center">Departamento</th>
                                <th class="center">Editar</th>
                                <th class="center">Eliminar</th>
                                <th class="center">Descargar</th>
                            </tr>
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
                        <div class="alert alert-info">
                            <strong>Execelente!</strong><br><br>
                            <ul>
                                <li>No hay Docente(s) ingresado(s)</li>
                            </ul>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
@endsection