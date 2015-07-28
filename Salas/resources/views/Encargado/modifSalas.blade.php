@extends('Encargado.homeEncar')

@section('content5')
	
{!!Form::open(['route' => 'encar.salas.modi.index', 'method' => 'GET'])!!}
                                
                               <div id="dataTables-example_wrapper" 
                                class="dataTables_wrapper form-inline dt-bootstrap no-footer"
                  <div class="panel-heading"><h1>SALAS</h1></div>
                                    <div class="panel-body">
                                    <p>
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