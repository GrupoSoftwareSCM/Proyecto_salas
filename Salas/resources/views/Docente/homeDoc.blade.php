@extends('Docente.header')


@section('content')
<!--{{$_SERVER['REQUEST_URI']}}-->
<div class="row">
	<div class="col-md-8 col-md-offset-2"> 
		<div class="panel panel-default">
			<div class="panel-body">
				@if($_SERVER['REQUEST_URI'] == "/doc")
					Bienvenido, en esta pagina usted podra reconocer su horario con sus respectivas salas de clases o conocer las asignaciones de salas de cada ramo por cada dia de la semana.........
				@endif

				@if($_SERVER['REQUEST_URI'] == "/doc/clases")
					Bienvenido, en esta pagina usted podra reconocer su horario y en donde le toca masacrar a sus alumnos
				@endif

				@if($_SERVER['REQUEST_URI'] == "/doc/salas")
					Bienvenido, en esta pagina usted podra consultar por salas de diferentes campus
				@endif
				
			</div>
		</div>
	</div>
</div>

@endsection