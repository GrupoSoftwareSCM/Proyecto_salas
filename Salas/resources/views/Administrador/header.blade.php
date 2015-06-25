<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
	<title>Bienvenido</title>
</head>
<body>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<br>
			<div class="panel panel-primary">
				<div class="panel-heading">
			  		<center>Bienvenido Administrador</center>
			  	</div>
			  	<div class="panel-body">
			  		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav nav-pills">
							@if($_SERVER['REQUEST_URI'] == "/adm")
								<li class="active"><a href="{{ url('adm')}}">Inicio</a></li>
							@else
								<li><a href="{{ url('adm')}}">Inicio</a></li>
							@endif

							@if($_SERVER['REQUEST_URI'] == "/adm/crear/Escuelas" || $_SERVER['REQUEST_URI'] == "/adm/crear/Deptos" || $_SERVER['REQUEST_URI'] == "/adm/crear" || $_SERVER['REQUEST_URI'] == "/adm/crear/apu" || $_SERVER['REQUEST_URI'] == "/adm/crear/cc" || $_SERVER['REQUEST_URI'] == "/adm/crear/aec" || $_SERVER['REQUEST_URI'] == "/adm/crear/apui" || $_SERVER['REQUEST_URI'] == "/adm/crear/apum" || $_SERVER['REQUEST_URI'] == "/adm/crear/Facult" || $_SERVER['REQUEST_URI'] == "/adm/crear/Facults" || $_SERVER['REQUEST_URI'] == "/adm/crear/Depto" || $_SERVER['REQUEST_URI'] == "/adm/crear/Escuela")
								<li class="active"><a href="{{ url('adm/crear')}}">Crear</a></li>
							@else
								<li><a href="{{ url('adm/crear')}}">Crear</a></li>
							@endif
							@if($_SERVER['REQUEST_URI'] == "/adm/modif/camps" || $_SERVER['REQUEST_URI'] == "/adm/modif/Escuela" || $_SERVER['REQUEST_URI'] == "/adm/modif/Depto" || $_SERVER['REQUEST_URI'] == "/adm/modif/Facultad" || $_SERVER['REQUEST_URI'] == "/adm/modif" || $_SERVER['REQUEST_URI'] == "/adm/modif/perfuser" || $_SERVER['REQUEST_URI'] == "/adm/modif/camp" || $_SERVER['REQUEST_URI'] == "/adm/modif/encamp")
								<li class="active"><a href="{{ url('adm/modif')}}">Modificar</a></li>
							@else
								<li><a href="{{ url('adm/modif')}}">Modificar</a></li>
							@endif
                            <li><a href="{{ url('adm/Eliminar')}}">Eliminar</a></li>
							<li><a href="{{ url('adm/Exportar')}}">Exportar</a></li>
						</ul>
					</div>
			  	</div>
			</div>
		</div>
	</div>
	@yield('content')

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<!--<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	-->

	{!!Html::script('js/bootstrap.min.js')!!}
	{!!Html::script('js/jquery-2.1.4.min.js')!!}
	{!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('js/alert.js')!!}
	<!--<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>-->
</body>
</html>