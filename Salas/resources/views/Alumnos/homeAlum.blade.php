@extends('Alumnos.header')


@section('content')

<div class="col-md-8 col-md-offset-2"> 
	@if(true) <!-- ver si el admin esta conectado	-->	
		<div class="panel panel-default">
			<div class="panel-body">
			Bienvenido, en esta pagina usted podra reconocer su horario con sus respectivas salas de clases o conocer las asignaciones de salas de cada ramo por cada dia de la semana.........
			</div>
		</div>
@endif
</div>

@endsection