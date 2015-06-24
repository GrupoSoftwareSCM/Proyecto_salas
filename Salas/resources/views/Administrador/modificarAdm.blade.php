@extends('Administrador.homeAdm')

@section('modificar')

<!--	MODIFICAR PERFILES DE USUARIOS	-->
@if($_SERVER['REQUEST_URI'] == "/adm/modif/perfuser")
    <div class="panel panel-success">
        <div class="panel-body">
        </div>
    </div>
@endif


<!--	MODIFICAR CAMPUS	-->
@if($_SERVER['REQUEST_URI'] == "/adm/modif/camp")
    <div class="panel panel-success">
        <div class="panel-body">
        </div>
    </div>
@endif

<!--	MODIFICAR FACULTAD	-->
@if($_SERVER['REQUEST_URI'] == "/adm/modif/Facultad")
    <div class="panel panel-success">
        <div class="panel-body">
        </div>
    </div>
@endif

<!--	MODIFICAR DEPARTAMENTO	-->
@if($_SERVER['REQUEST_URI'] == "/adm/modif/Depto")
    <div class="panel panel-success">
        <div class="panel-body">
        </div>
    </div>
@endif

<!--	MODIFICAR ESCUELA	-->
@if($_SERVER['REQUEST_URI'] == "/adm/modif/Escuela")
    <div class="panel panel-success">
        <div class="panel-body">
        </div>
    </div>
@endif

<!--	MODIFICAR ENCARGADO CAMPUS	-->
@if($_SERVER['REQUEST_URI'] == "/adm/modif/encamp")
	<div class="row">
		<div class="col-md-8 col-md-offset-2"> 
			<form role="form" method="POST"> <!-- EL ACTION LO VEMOS DESPUES -->
				<div class="form-group">
					<div class="col-md-5">
						<label>Ingrese un campus</label>
					</div>
					<div class="col-md-7">
						<input list="campus" name="campus">
						<datalist id="campus">
							<option value="MACUL">
							<option value="390">
							<option value="CENTRO">
						</datalist>
					</div>
					<br>
					<br>
					<div class="col-md-5">
						<label>Ingrese RUT de encargado</label>
					</div>
					<div class="col-md-7">
						<input type="text" class="form-control" name="RutEncargado">
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