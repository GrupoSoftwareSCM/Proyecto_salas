<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<title>Bienvenido</title>
</head>
<body>
	<div class="row">
		<div class="col-md-8 col-md-offset-2"> 
		<br>
			<div class="panel panel-default">
				<div class="panel-heading">
			  		<center>Título del panel con estilo normal</center>
			  	</div>
			  	<div class="panel-body">
			  		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li><a href="{{ url('/adm')}}">Inicio</a></li>
							<li><a href="{{ url('/adm')}}">Crear</a></li>
							<li><a href="{{ url('/adm')}}">Modificar</a></li>
							<li><a href="{{ url('/adm')}}">Archivar</a></li>
						</ul>
					</div>
			  	</div>
			</div>
		</div>
		@yield('content')
	</div>
</body>
</html>