@extends('Encargado.homeEncar')

@section('content5')
	
{!!Form::open(['route' => 'encar.salas.modi.index', 'method' => 'GET'])!!}
                                <div class="panel panel-success">
                                             <div class="panel-body">

                               <div class="panel-heading"><h1>SALAS</h1></div>
                                    <div class="panel-body">
                                      <p>
                                      <a class="btn btn-info" href="modi/create" role="button">

                                      Nueva sala</a>
                                             <div class="row">
                           
                                <nav class="navbar navbar-left">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <tr><th class="center">Descargar Salas</th></tr>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/sala-encarall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                    </table>
                                </nav>
                           
                        </div>
                                    </p>
                                    <p>Hay {{ $salas->total() }} Registros</p>
                                        <table class="table table-bordered">
                                            <tr>
                                             
                                              <th>Nombre</th>
                                              <th>Descripcion</th>
                                              <th>Capacidad</th>
                                              <th>Pertenece a campus</th>
                                              <th>Pertenece a tipo de salas</th>
                                              <th>Accion</th>
                                              
                                            </tr>

                                           @foreach($salas as $Sal)
                                            <tr>
                                        
                                                <td>{{$Sal-> nombre}}</td>
                                                <td>{{$Sal-> descripcion}}</td>
                                                <td>{{$Sal-> capacidad}}</td>
                                                <td>{{$Sal-> Campus->nombre}}</td>
                                                <th>{{$Sal-> Tipo_Sala->nombre}}</th>
                                                <td><a href="{{ route('encar.salas.modi.edit', $Sal ) }}">Editar</td>      
                                            </tr>
                                           @endforeach
                                        </table>
                                        {!! $salas->render()!!}
                                    </div>
                                    </div>
                                    </div>
                                  
{!!Form::close()!!}
@endsection