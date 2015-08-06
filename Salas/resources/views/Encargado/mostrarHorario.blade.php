@extends('Encargado.homeEncar')

@section('content')
                
                 <div class="panel panel-success">
                                             <div class="panel-body">
                @if ($errors->any())
                    <div class="alert alert-warning" role="alert">
                 
                    <ul>
                         @foreach($errors->all() as $error)
                         <li>{{ $error }} </li>
                          @endforeach
                      </ul>
                      @endif
                  </div>
	
{!!Form::open(['route' => 'encar.salas.modi.show', 'method' => 'GET'])!!}
                             

                               <div class="panel-heading"><h1>SALAS</h1></div>
                                    <div class="panel-body">
                                      <p>
                                     
                                    </p>
                                    <p>Hay {{ $salas->total() }} Registros</p>
                                        <table class="table table-bordered">
                                            <tr>
                                             
                                              <th>Nombre</th>
                                              <th>Periodo</th>
                                              
                                            </tr>

                                           @foreach($salas as $Sal)
                                            <tr>
                                        
                                                <td>{{$Sal-> nombre}}</td>
                                                <th>{{ $periodos->inicio }}-{{ $periodos->fin }}</th>
                                            </tr>
                                           @endforeach
                                        </table>
                                        {!! $salas->render()!!}
                                    </div>

                         <a class="btn btn-danger" href="{{url('encar/hora/modi')}}" role="button">Volver</a>
                                    </div>
                                    </div>
                                  
{!!Form::close()!!}
@endsection