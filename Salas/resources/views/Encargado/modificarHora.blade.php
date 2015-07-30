@extends('Encargado.homeEncar')

@section('content8')


{!!Form::open(['route' => 'encar.hora.modi.index', 'method' => 'GET'])!!}
                                
                               <div id="dataTables-example_wrap per" 
                                class="dataTables_wrapper form-inline dt-bootstrap no-footer"
                  <div class="panel-heading"><h1>HORARIO</h1></div>
                                    <div class="panel-body">
                                    <p>
                                      <a class="btn btn-info" href="modi/create" role="button">

                                      Nuevo curso</a>
                                    </p>
                                    <p>Hay {{ $horario->total() }} Registros</p>
                            <table id="table_id" class="table table-bordered">
                                    <thead>
                                        <tr>
                             
                                            <th>Fecha</th>
                                            <th>Sala</th>
                                            <th>Periodo</th>
                                            <th>Curso:seccion</th>
                                            <th>accion</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($horario as $Hora)
                                          <tr>
                               
                                            <td>{{ $Hora->fecha}}</td>
                                            <td>{{ $Hora->sala->nombre}}</td>                                                                               
                                            <td>{{ $Hora->periodo->inicio}} - {{$Hora->periodo->fin}}</td>
                                            <td>{{ $Hora->curso->seccion}}</td>
                                            
                                            <td>
                                             <a href="{{ route('encar.curs.modi.edit', $Hora) }}">Editar</a>
                                             
                                             </td>
                                             
                                        </tr>
                                     
                                      @endforeach
                                    </tbody>
                               </table>

                                </div>  
                                                      
                        </div> 

            </div>      


    </div>

    

@endsection
