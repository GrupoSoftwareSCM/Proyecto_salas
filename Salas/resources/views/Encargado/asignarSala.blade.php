@extends('Encargado.homeEncar')

@section('content6')
{!!Form::open(['route' => 'encar.asignar.modi.index', 'method' => 'GET'])!!}

 <div id="dataTables-example_wrapper" 
                                class="dataTables_wrapper form-inline dt-bootstrap no-footer"
                  <div class="panel-heading"><h1>CURSOS </h1></div>

                  					{{--dd($cursos[0]->asignatura->nombre)--}}
                                    <div class="panel-body">                                    
                                    <p>Hay {{ $cursos->total() }} Registros</p>
                            <table id="table_id" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Asignatura</th>
                                            <th>Docente</th>
                                            <th>semestre</th>
                                            <th>anio</th>
                                            <th>seccion</th>
                                            <th># estudiantes </th>
                                            <th>accion</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<count($cursos);$i++)
                                          <tr>
                                            
                                            <td>{{ $cursos[$i]->id}}</td>
                                            <td>{{ $cursos[$i]->asignatura->nombre}}</td>
                                            <td>{{ $cursos[$i]->docente->nombres}}</td>
                                            <td>{{ $cursos[$i]->semestre}}</td>
                                            <td>{{ $cursos[$i]->anio}}</td>
                                            <td>{{ $cursos[$i]->seccion}}</td>
                                            <td>{{ $cantidad_alumno[$i]}}</td>
                                            
                                            <td>
                                         
                                            <a href="{{ route('encar.asignar.modi.show',$cursos[$i]) }}">Asignar</a>	
                                             
                                             </td>
                                             
                                        </tr>
                                     
                                      @endfor
                                    </tbody>
                               </table>

                                </div>  
                                                      
                        </div> 

            </div>      


    </div>




{!!Form::close()!!}
@endsection