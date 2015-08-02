@extends('Encargado.homeEncar')

@section('content3')


{!!Form::open(['route' => 'encar.curs.modi.index', 'method' => 'GET'])!!}
                                
                               <div id="dataTables-example_wrapper" 
                                class="dataTables_wrapper form-inline dt-bootstrap no-footer"
                  <div class="panel-heading"><h1>CURSOS</h1></div>
                                    <div class="panel-body">
                                    <p>
                                      <a class="btn btn-info" href="modi/create" role="button">

                                      Nuevo curso</a>
                                      <div class="row">
                           
                                <nav class="navbar navbar-left">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <tr><th class="center">Descargar Sala</th></tr>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/curso-encarall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                    </table>
                                </nav>
                           
                        </div>
                                    </p>
                                    <p>Hay {{ $cursos->total() }} Registros</p>
                            <table id="table_id" class="table table-bordered">
                                    <thead>
                                        <tr>
                             
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
                                 {!!$cursos->render()!!}
                                </div>  
                                                      
                        </div> 

            </div>      


    </div>

    

@endsection
