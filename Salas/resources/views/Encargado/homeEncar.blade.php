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
					<h2>Modificar sala</h2>
					<div class="row">
						
					  	<form name="formulario" id="formulario" action="/demos/2013/05-html-form-datalist.php" method="POST">
                        <div class="form-group">
                        <div class="col-md-4"><b>SALA</b></div>
                         <div class="col-md-8"> <datalist id="salas">
                            <option value="M1....">
                            <option value="M2....">
                            <option value="M3....">
                            <option value="M4....">
                         </datalist>
                    <input name="SALA" list="salas">
                        </div>
                        <div>
                        <div class="col-md-4"><label for="date">CAPACIDAD</label></div>
                        <div class="col-md-8"><input type="number" value="1" min="1" max="50"></div>
                        
 						<div class="col-md-4"><label for="date">NOMBRE</label></div>
						<div class="col-md-8"><input type="text"</div>
						</div><br>
						 <div class="btn-group">
                         <div class="col-md-8"><button type="button" class="btn btn-primary">ACEPTAR</button>

                        </div>
						</form>
						
					</div>
				@endif

				@if($_SERVER['REQUEST_URI'] == "/encar/ingre" || $_SERVER['REQUEST_URI'] == "/encar/ingre/cursos") 
                   <span style="color: #7292E9;"><h3>INGRESO DE DATOS ACADEMICOS</h3>
                  <ul class="nav nav-pills">
                  <li class="active"><a href="{{ url('encar/ingre')}}">Inicio</a></li>
                  <li><a href="{{ url('encar/ingre/cursos')}}">CURSOS</a></li>
                  <li><a href="{{ url('encar/ingre/asig')}}">ASIGNATURAS</a></li>
                  <li><a href="{{ url('encar/ingre/estu')}}">ESTUDIANTES</a></li>

                  </ul>
                
                @yield('content2')
           		@endif
			</div>
		</div>
	</div>
</div>

@endsection