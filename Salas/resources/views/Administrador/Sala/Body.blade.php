@extends('Administrador.homeAdm')

@section('body')
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
@endsection