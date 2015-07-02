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
							@if($_SERVER['REQUEST_URI'] == "/Admin/home")
                                <li class="active">{!!Html::link('Admin/home','Home',['route' => 'Admin.home.index'])!!}</li>
							@else
                                <li>{!!Html::link('Admin/home','Home',['route' => 'Admin.home.index'])!!}</li>
							@endif

							@if($_SERVER['REQUEST_URI'] == "/Admin/Campus/create" || $_SERVER['REQUEST_URI'] == "/Admin/home/1")
                                <li class="active">{!!Html::link('Admin/home/1','Crear',['route' => 'Admin.home.show'])!!}</li>
							@else
                                <li>{!!Html::link('Admin/home/1','Crear',['route' => 'Admin.home.show'])!!}</li>
							@endif
							@if($_SERVER['REQUEST_URI'] == "/Admin/Campus/2" || $_SERVER['REQUEST_URI'] == "/Admin/home/2")
                                <li class="active">{!!Html::link('Admin/home/2','Modificar',['route' => 'Admin.home.show'])!!}</li>
							@else
                                <li>{!!Html::link('Admin/home/2','Modificar',['route' => 'Admin.home.show'])!!}</li>
							@endif
                            @if($_SERVER['REQUEST_URI'] == "/adm/create/3")
                                <li class="active">{!!Html::link('Admin/home/3','Eliminar',['route' => 'Admin.home.show'])!!}</li>
                            @else
                                <li>{!!Html::link('Admin/home/3','Eliminar',['route' => 'Admin.home.show'])!!}</li>
                            @endif
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