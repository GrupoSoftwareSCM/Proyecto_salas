@extends('Encargado.header')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2"> 
		<div class="panel panel-default">
			<div class="panel-body">
				@if($_SERVER['REQUEST_URI'] == "/encar")
						Bienvenido admnistrador, en esta pagina usted podra ..............................
				@endif

				@if($_SERVER['REQUEST_URI'] == "/encar/asig")
					Asignacion de salas a un respectivo curso/evento en un periodo especıfico
                   del calendario academico.
				@endif

				@if($_SERVER['REQUEST_URI'] == "/encar/modif")
					Modificar aspectos como la capacidad y nombre de salas.
				@endif

				@if($_SERVER['REQUEST_URI'] == "/adm/ingre")
                   Ingreso de datos acad´emicos (e.g Cursos, asignaturas, estudiantes).		
           		@endif
			</div>
		</div>
	</div>
</div>

@endsection