@extends('Administrador.homeAdm')

@section('crear')

@if($_SERVER['REQUEST_URI'] == "/adm/crear/apui")
	<div class="row">
		<div class="col-md-8 col-md-offset-2"> 
			{!!Form::open(['url' => 'asignarPerfilInd'])!!}
				<div class="form-group">
					<div class="col-md-5">
						<label>Ingrese el RUT del usuario</label>
					</div>
					<div class="col-md-7">
						{!!Form::input('text','Rut_usuario')!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					<div class="col-md-5">
						<label>Asignar perfil</label>
					</div>
					<div class="col-md-7">
						{!!Form::select('user',['Administrador' => 'Administrador',
											    'Encargado_campus' => 'Encargado de campus',
											    'Estudiante' => 'Estudiante',
											    'Docente' => 'Docente'])!!}
					</div>
				</div>
				<div class="col-md-5">
					<button type="submit" class="btn btn-danger">Actualizar</button>
				</div>
			{!!Form::close()!!}
			<!--</form>-->
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
	<div class="row"> <!-- PARA LOS MENSAJES DE ERROR O DE INGRESO CORRECTO-->
        <div class="col-md-8 col-md-offset-2 ">
            @if($mensaje != null && $error == null)
                <div class="alert alert-success">
                    <center>Campus {{$mensaje['nombre']}} Ingresado correctamente</center>
                </div>
            @elseif($error != null)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endif
        </div>
    </div>
    <div class="row"> <!-- PARA LOS FORMULARIO -->
		<div class="col-md-12">
			{!!Form::open(['url' => 'adm/crear/cc'])!!}
				<div class="form-group">
                    <div class="row"> <!--CAMPUS Y FACULTAD-->
                        <div class="col-md-6">
                            {!!Form::label('Nombre_campus','Nombre Campus',['class' => 'col-md-6'])!!}
                            {!!Form::text('Campus','',['class' => 'col-md-6'])!!}

                            {!!Form::label('Rut_Encargado','Rut Encargado',['class' => 'col-md-6'])!!}
                            {!!Form::text('Rut_Encargado','',['class' => 'col-md-6'])!!}

                            {!!Form::label('direccion','Dirección',['class' => 'col-md-6'])!!}
                            {!!Form::text('Direccion','',['class' => 'col-md-6'])!!}

                            {!!Form::label('latitud','Latitud',['class' => 'col-md-6'])!!}
                            {!!Form::number('latitud','',['class' => 'col-md-6','step' => '0.001'])!!}

                            {!!Form::label('longitud','Longitud',['class' => 'col-md-6'])!!}
                            {!!Form::number('longitud','',['class' => 'col-md-6','step' => '0.001'])!!}


                            {!!Form::label('descripcion_campus','Descripcion',['class' => 'col-md-6'])!!}
                            {!!Form::textarea('Descripcion_campus','',['class' => 'col-md-6'])!!}
                        </div>
                        <div class="col-md-6">
                            {!!Form::label('Nombre_facultad','Nombre facultad',['class' => 'col-md-6'])!!}
                            {!!Form::text('facultad','',['class' => 'col-md-6'])!!}

                            {!!Form::label('descripcion_facultad','Descripcion',['class' => 'col-md-6'])!!}
                            {!!Form::textarea('Descripcion_facultad','',['class' => 'col-md-6'])!!}

                        </div>
                    </div>
				</div>
				<div class="col-md-7">
					<br>
						{!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
				</div>
			{!!Form::close()!!}
		</div>
	</div>
@endif

@if($_SERVER['REQUEST_URI'] == "/adm/crear/aec")
	estamos en asignar encargados a campus
@endif
@endsection