@extends('Administrador.header')

@section('content')
<div class="col-md-8 col-md-offset-2"> 
	@if(url('/adm')) <!-- ver si el admin esta conectado	-->	
		<div class="panel panel-default">
			<div class="panel-body">
			Bienvenido admnistrador, en esta pagina usted podra ..............................
			</div>
		</div>
	@if(url('/adm/create'))
		hola
	@endif
</div>

@endsection