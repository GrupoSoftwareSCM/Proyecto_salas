@extends('Administrador.homeAdm')

@section('body')
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
@endsection