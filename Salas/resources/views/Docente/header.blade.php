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
		<div class="col-md-8 col-md-offset-2"> 
		<br>
			<div class="panel panel-primary">
				<div class="panel-heading">
			  		<center>Título del panel con estilo normal</center>
			  	</div>
			  	<div class="panel-body">
			  		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav nav-pills">
							@if($_SERVER['REQUEST_URI'] == "/doc")
								<li class="active"><a href="{{ url('doc')}}">Inicio</a></li>
							@else
								<li><a href="{{ url('doc')}}">Inicio</a></li>
							@endif

							@if($_SERVER['REQUEST_URI'] == "/doc/clases")
								<li class="active"><a href="{{ url('doc/clases')}}">Clases</a></li>
							@else
								<li><a href="{{ url('doc/clases')}}">Clases</a></li>
							@endif

							@if($_SERVER['REQUEST_URI'] == "/doc/salas")
								<li class="active"><a href="{{ url('doc/salas')}}">Salas</a></li>
							@else
								<li><a href="{{ url('doc/salas')}}">Salas</a></li>
							@endif
						</ul>
					</div>
			  	</div>
			</div>
		</div>
	</div>
	@yield('content')

	{!!Html::script('js/bootstrap.min.js')!!}
	{!!Html::script('js/jquery-2.1.4.min.js')!!}
	{!!Html::script('js/jquery.min.js')!!}

</body>
</html>