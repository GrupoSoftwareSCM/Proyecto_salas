@extends('Alumnos.header')


@section('content')
<!--{{$_SERVER['REQUEST_URI']}}-->
<div class="row">
	<div class="col-md-8 col-md-offset-2"> 
		<div class="panel panel-default">
			<div class="panel-body">
				@if($_SERVER['REQUEST_URI'] == "/alum")
					Bienvenido, en esta pagina usted podra reconocer su horario con sus respectivas salas de clases o conocer las asignaciones de salas de cada ramo por cada dia de la semana.........
				@endif

				@if($_SERVER['REQUEST_URI'] == "/alum/horario")
					Bienvenido, en esta pagina usted podra reconocer su horario 
				@endif

				@if($_SERVER['REQUEST_URI'] == "/alum/salas")
					Bienvenido, en esta pagina usted podra reconocer su salas
				@endif
				
			</div>
		</div>
	</div>
</div>

@endsection