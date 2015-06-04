@extends('Administrador.header')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2"> 
		<div class="panel panel-default">
			<div class="panel-body">
				@if($_SERVER['REQUEST_URI'] == "/adm")
						Bienvenido admnistrador, en esta pagina usted podra ..............................
				@endif

				@if($_SERVER['REQUEST_URI'] == "/adm/crear")
					estamos en crear 
				@endif

				@if($_SERVER['REQUEST_URI'] == "/adm/modif")
					estamos en mo
				@endif

				@if($_SERVER['REQUEST_URI'] == "/adm/archivar")
					estamos en archivar
				@endif
			</div>
		</div>
	</div>
</div>

@endsection