@extends('Encargado.homeEncar2')

@section('content3')


{!!Form::open(['route' => 'encar.curs.modi.index', 'method' => 'GET'])!!}
                                
                               <div id="dataTables-example_wrapper" 
                                class="dataTables_wrapper form-inline dt-bootstrap no-footer"
                  <div class="panel-heading"><h1>CURSOS</h1></div>
                                    <div class="panel-body">
                                    <p>
                                      <a class="btn btn-info" href="modi/create" role="button">

                                      Nuevo curso</a>
                                    </p>
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
                                            <th>accion</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($cursos as $cur)
                                          <tr>
                                            
                                            <td>{{ $cur->id_cursos}}</td>
                                            <td>{{ $cur->asignatura->nombre}}</td>
                                            <td>{{ $cur->docente->nombres}}</td>
                                            <td>{{ $cur->semestre}}</td>
                                            <td>{{ $cur->anio}}</td>
                                            <td>{{ $cur->seccion}}</td>
                                            
                                            <td>
                                             <a href="{{ route('encar.curs.modi.edit', $cur) }}">Editar</a>
                                             
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
