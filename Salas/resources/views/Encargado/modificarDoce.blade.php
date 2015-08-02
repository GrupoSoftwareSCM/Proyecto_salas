@extends('Encargado.homeEncar')

@section('content7')

{!!Form::open(['route' => 'encar.doce.modi.index', 'method' => 'GET'])!!}
                                
                               <div id="dataTables-example_wrapper" 
                                class="dataTables_wrapper form-inline dt-bootstrap no-footer"
  								<div class="panel-heading"><h1>Docentes</h1></div>
                                    <div class="panel-body">
                                    <p>
                                    	<a class="btn btn-info" href="modi/create" role="button">

                                    	Nuevo Docente</a>
                                      <div class="row">
                           
                                <nav class="navbar navbar-left">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <tr><th class="center">Descargar Docentes</th></tr>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/docente-encarall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                    </table>
                                </nav>
                           
                        </div>
                                    </p>
                                    <p>Hay {{ $docentes->total() }} Registros</p>
                                        <table class="table table-bordered">
                                            <tr>
                                    
                                              <th>Rut</th>
                                              <th>Nombres</th>
                                              <th>Apellidos</th>
                                              <th>Carrera</th>
                                              <th>Accion</th>

                                              
                                            </tr>

                                           @foreach($docentes as $Doce)
                                            <tr>
                                              
                                                <td>{{$Doce-> rut}}</td>
                                                <td>{{$Doce-> nombres}}</td>
                                                <td>{{$Doce-> apellidos}}</td>
                                                <td>{{$Doce-> departamento->nombre}}</td>
                                                <td><a href="{{ route('encar.doce.modi.edit', $Doce ) }}">Editar</td>      
                                            </tr>
                                           @endforeach
                                        </table>
                                        {!! $docentes->render()!!}
                                    </div>
                                    </div>
                                    </div>
                                  
{!!Form::close()!!}


@endsection