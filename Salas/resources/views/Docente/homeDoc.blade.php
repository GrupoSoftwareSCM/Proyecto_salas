@extends('Docente.header')


@section('content')
<!--{{$_SERVER['REQUEST_URI']}}-->
<div class="row">
	<div class="col-md-8 col-md-offset-2"> 
		<div class="panel panel-default">
			<div class="panel-body">
				<!--	HOME DOCENTE	-->
				@if($_SERVER['REQUEST_URI'] == "/doc")
					Bienvenido, en esta pagina usted podra reconocer su horario con sus respectivas salas de clases o conocer las asignaciones de salas de cada ramo por cada dia de la semana.........
				@endif

				<!--	CLASES DEL DOCENTE	-->
				@if($_SERVER['REQUEST_URI'] == "/doc/clases")
					@yield('consultar')
				@endif

				<!--	CONSULTAS DE SALAS POR CAMPUS	-->
				@if($_SERVER['REQUEST_URI'] == "/doc/salas")
					@yield('consultar')
				@endif
				
			</div>
		</div>
	</div>
</div>

@endsection