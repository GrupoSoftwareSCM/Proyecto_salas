@extends('Encargado.cursos')

@section('modificar')
@if($_SERVER['REQUEST_URI'] == "/encar/ingre/cursos/agre")
	<div class="row">
		<div class="col-md-8 col-md-offset-2"> 
			<form role="form" method="POST"> <!-- EL ACTION LO VEMOS DESPUES -->
				<div class="form-group">
					<div class="col-md-8">
						<input type="text" class="form-control" name="Semestre" placeholder="Semestre">
					</div>
					<br>
					<br>
					<div class="col-md-8">
						<input type="text" class="form-control" name="anio" placeholder="anio">
					</div>
					
				</div>
				<div class="col-md-7">
					<button type="submit" class="btn btn-danger">Actualizar</button>
				</div>
			</form>
		</div>
	</div>
@endif
@endsection