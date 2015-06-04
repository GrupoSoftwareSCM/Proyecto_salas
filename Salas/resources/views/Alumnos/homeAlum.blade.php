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

				  <div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control">
 
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle"
                data-toggle="dropdown">
          Acción <span class="caret"></span>
        </button>
 
        <ul class="dropdown-menu pull-right" role="menu">
          <li><a href="#">Acción 1</a></li>
          <li><a href="#">Acción #2</a></li>
          <li><a href="#">Acción #3</a></li>
          <li class="divider"></li>
          <li><a href="#">Acción #4</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
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