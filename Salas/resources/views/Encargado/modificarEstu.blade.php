@extends('Encargado.homeEncar2')

@section('content4')

{!!Form::open(['route' => 'encar.estu.modi.index', 'method' => 'GET'])!!}
                                
                               <div id="dataTables-example_wrapper" 
                                class="dataTables_wrapper form-inline dt-bootstrap no-footer"
  								<div class="panel-heading"><h1>ESTUDIANTES</h1></div>
                                    <div class="panel-body">
                                    <p>
                                    	<a class="btn btn-info" href="modi/create" role="button">

                                    	Nuevo Estudiante</a>
                                    </p>
                                    <p>Hay {{ $estu->total() }} Registros</p>
                                        <table class="table table-bordered">
                                            <tr>
                                              <th>Id</th>
                                              <th>Nombres</th>
                                              <th>Rut</th>
                                              <th>Apellidos</th>
                                              <th>Email</th>
                                              <th>Carrera</th>
                                              <th>Accion</th>

                                              
                                            </tr>

                                           @foreach($estu as $Estu)
                                            <tr>
                                                <td>{{$Estu-> id_estudiantes }}</td>
                                                <td>{{$Estu-> nombres}}</td>
                                                <td>{{$Estu-> rut}}</td>
                                                <td>{{$Estu-> apellidos}}</td>
                                                <td>{{$Estu-> email}}</td>
                                                <td>{{$Estu-> carrera->nombre}}</td>
                                                <td><a href="{{ route('encar.estu.modi.edit', $Estu ) }}">Editar</td>      
                                            </tr>
                                           @endforeach
                                        </table>
                                        {!! $estu->render()!!}
                                    </div>
                                    </div>
                                    </div>
                                  
{!!Form::close()!!}

@endsection