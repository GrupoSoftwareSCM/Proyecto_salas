@extends('Encargado.homeEncar')

@section('content5')
   
	
<!--{!!Form::open(['route' => 'encar.salas.modi.show', 'method' => 'GET'])!!}-->
 {!! Form::open(['action' => 'Encargado\SalasController@show', 'method' => 'GET']) !!}   
    <div class="form-group">
    {!! Form::label('nombre', 'Pertenece a campus: ') !!}
    {!! Form::select('campus_id', $campus) !!}
    </div>
    <button type="submit" a href="{{ route('encar.salas.modi.show', $campus) }}" class="btn btn-primary">EDITAR
     <div align="center"<th><button type="submit" class="btn btn-primary" >Siguiente</button></th></div>
    {!! Form::close() !!}
                                  
@endsection