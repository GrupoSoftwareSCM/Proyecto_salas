@extends('Administrador.homeAdm')

@section('crear')

@if($_SERVER['REQUEST_URI'] == "/adm/crear/apui")
	<div class="row">
		<div class="col-md-8 col-md-offset-2"> 
			<form role="form" method="POST"> <!-- EL ACTION LO VEMOS DESPUES -->
				<div class="form-group">
					<div class="col-md-5">
						<label>Ingrese un tipo de usuario</label>
					</div>
					<div class="col-md-7">
						<input list="Usuarios" name="Usuarios">
						<datalist id="Usuarios">
							<option value="Alumnos">
							<option value="Funcionario">
							<option value="Encargado">
						</datalist>
					</div>
				</div>
				<br>
				<div class="form-group">
					<div class="col-md-5">
						<label>Ingrese el RUT del usuario</label>
					</div>
					<div class="col-md-7">
						<input list="RUT_usuario" name="RUT_usuario">
						<datalist id="RUT_usuario">
							<option value="RUT_1"> <!-- ACA VAMOS A COLOCAR UN FOREACH PARA  BUSCAR LOS DISTINTOS-->
							<option value="RUT_2"> <!-- 	RUT QUE NOS PUEDAN -->
							<option value="RUT_3">
						</datalist>
					</div>
				</div>
				<br>
				<div class="form-group">
					<div class="col-md-5">
						<label>Asignar perfil</label>
					</div>
					<div class="col-md-7">
						<input list="Perfil" name="Perfil">
						<datalist id="Perfil">
							<option value="Administrador"> 
							<option value="Encardo de campus"> 
							<option value="Docente">
							<option value="Alumno">
						</datalist>
					</div>
				</div>
				<div class="col-md-5">
					<button type="submit" class="btn btn-danger">Actualizar</button>
				</div>
			</form>
		</div>
	</div>
@endif

@if($_SERVER['REQUEST_URI'] == "/adm/crear/apum")
	<div class="row">
		<div class="col-md-8 col-md-offset-2"> 
			<form role="form" method="POST"> <!-- EL ACTION LO VEMOS DESPUES -->
				<div class="form-group">
					<div class="col-md-5">
						<label>Ingrese un tipo de usuario</label>
					</div>
					<div class="col-md-7">
						<input list="Usuarios" name="Usuarios">
						<datalist id="Usuarios">
							<option value="Alumnos">
							<option value="Funcionario">
							<option value="Encargado">
						</datalist>
					</div>
				</div>
				<div class="col-md-5">
					<button type="submit" class="btn btn-danger">Actualizar</button>
				</div>
			</form>
		</div>
	</div>
@endif

@if($_SERVER['REQUEST_URI'] == "/adm/crear/cc")
	<div class="row">
		<div class="col-md-8 col-md-offset-2"> 
			<form role="form" method="POST"> <!-- EL ACTION LO VEMOS DESPUES -->
				<div class="form-group">
					<div class="col-md-7">
						<input type="text" class="form-control" name="NombCampu" placeholder="Nombre Campus">
					</div>
					<br>
					<br>
					<div class="col-md-7">
						<input type="text" class="form-control" name="Direccion" placeholder="Direccion">
					</div>
					<br>
					<br>
					<div class="col-md-7">
						<input type="number" step="0.001" class="form-control" name="Latitud" placeholder="latitud">
					</div>
					<br>
					<br>
					<div class="col-md-7">
						<input type="number" step="0.001" class="form-control" name="Longitud" placeholder="longitud">
					</div>
					<br>
					<br>
					<div class="col-md-7">
						<input type="text" class="form-control" name="Descripcion" placeholder="Descripcion" size="50">
					</div>
					<br>
					<br>
				</div>
				<div class="col-md-7">
					<button type="submit" class="btn btn-danger">Actualizar</button>
				</div>
			</form>
		</div>
	</div>
@endif

@if($_SERVER['REQUEST_URI'] == "/adm/crear/aec")
	estamos en asignar encargados a campus
@endif
@endsection