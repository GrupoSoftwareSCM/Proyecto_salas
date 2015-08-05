@extends('Encargado.homeEncar')

@section('content2')
 


{!!Form::open(['route' => 'encar.asig.modi.index', 'method' => 'GET'])!!}
                                
       <div class="panel panel-success">
             <div class="panel-body">
  								<div class="panel-heading"><h1>ASIGNATURAS</h1></div>
                           <div class="panel-body">
                                    <p><a class="btn btn-info" href="modi/create" role="button">Nueva asignatura</a>
                                    <div class="row">
                           
                                       <nav class="navbar navbar-left">
                                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                                <tr><th class="center">Descargar Asignaturas</th></tr>
                                                <tr><th class="center">
                                                    {!!Html::link('files/asignatura-encarall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                                    </th>
                                                </tr>
                                            </table>
                                        </nav>
                           
                                    </div>
                                    </p>
                             <p>Hay {{ $asignatura->total() }} Registros</p>
                             <div class="table-responsive">
                             <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                            <tr>
                                      
                                              <th>Nombre</th>
                                              <th>Codigo</th>
                                              <th>Departamento</th>
                                              <th>Accion</th>
                                              
                                            </tr>

                                           @foreach($asignatura as $Asig)
                                            <tr>
                     
                                                <td>{{$Asig-> nombre}}</td>
                                                <td>{{$Asig-> codigo}}</td>
                                                <td>{{$Asig->departamento->nombre}}</td>
                                                <td><a href="{{ route('encar.asig.modi.edit', $Asig ) }}">Editar</td></a>    
                                            </tr>
                                           @endforeach
                                        </table>
                                        {!! $asignatura->render()!!}
                               </div>
                     </div>
    
                                  
{!!Form::close()!!}

@endsection
       