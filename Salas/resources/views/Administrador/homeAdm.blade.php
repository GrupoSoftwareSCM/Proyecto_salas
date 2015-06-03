@extends('Administrador.header')

@section('content')
<div class="col-md-8 col-md-offset-2"> 
	@if(true) <!-- ver si el admin esta conectado	-->	
		<div class="panel panel-default">
			<div class="panel-body">
			Bienvenido admnistrador, en esta pagina usted podra ..............................
			</div>
		</div>
@endif
</div>

@endsection