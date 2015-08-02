@extends('Encargado.homeEncar')

@section('content2')
 


{!!Form::open(['route' => 'encar.asig.modi.index', 'method' => 'GET'])!!}
                                
                               <div id="dataTables-example_wrapper" 
                                class="dataTables_wrapper form-inline dt-bootstrap no-footer"
  								<div class="panel-heading"><h1>ASIGNATURAS</h1></div>

                                    <div class="panel-body">
                                    <p>
                                    	<a class="btn btn-info" href="modi/create" role="button">

                                    	Nueva asignatura</a>
                                      <div class="row">
                           
                                <nav class="navbar navbar-left">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <tr><th class="center">Descargar Asignaturas</th></tr>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/asignatura-encarall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                    </table>
                                </nav>
                           
                        </div>
                                    </p>
                                    <p>Hay {{ $asignatura->total() }} Registros</p>
                                        <table class="table table-bordered">
                                            <tr>
                                      
                                              <th>Nombre</th>
                                              <th>Codigo</th>
                                              <th>Pertenece a departamento</th>
                                              <th>Accion</th>
                                              
                                            </tr>

                                           @foreach($asignatura as $Asig)
                                            <tr>
                     
                                                <td>{{$Asig-> nombre}}</td>
                                                <td>{{$Asig-> codigo}}</td>
                                                <td>{{$Asig-> departamento->nombre}}</td>
                                                <td><a href="{{ route('encar.asig.modi.edit', $Asig ) }}">Editar</td>      
                                            </tr>
                                           @endforeach
                                        </table>
                                        {!! $asignatura->render()!!}
                                    </div>
                                    </div>
                                    </div>
                                  
{!!Form::close()!!}

@endsection
       