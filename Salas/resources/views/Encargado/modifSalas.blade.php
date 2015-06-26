@extends('Encargado.header')

@section('content')
	

@if($_SERVER['REQUEST_URI'] == "/encar/modif/salas")

{!!Form::open(['url' => 'encar/modif/salas'])!!}
  								<div class="panel-heading">SALAS</div>
                                    <div class="panel-body">
                                        <table class="table table-striped">
                                            <tr>
                                              <th>#</th>
                                              <th>Nombre</th>
                                              <th>Capacidad</th>
                                              <th>Acciones</th>
                                            </tr>

                                           @foreach($salas as $Salas)
                                            <tr>
                                                <td>{{$Salas-> id_salas }}</td>
                                                <td>{{$Salas-> nombre}}</td>
                                                <td>{{$Salas-> descripcion}}</td>
                                                <td><a href="">Editar</td>

                                            </tr>
                                           @endforeach
                                        </table>
                                        {!! $salas->render()!!}
                                    </div>
{!!Form::close()!!}
@endif