@extends('Administrador.homeAdm')

@section('crear')

@if($_SERVER['REQUEST_URI'] == "/adm/crear/apui")
    <div class="panel panel-success">
        <div class="panel-body">

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
    <div class="panel panel-success">
        <div class="panel-body">
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

@if($_SERVER['REQUEST_URI'] == "/adm/Campus")
    <div class="panel panel-success">
        <div class="panel-body">
            <div class="row"> <!-- PARA LOS MENSAJES DE ERROR O DE INGRESO CORRECTO-->
                <div class="col-md-8 col-md-offset-2 ">
                    @if($mensaje != null && $error == null)
                        <div class="alert alert-success">
                            <center>Campus Ingresado correctamente</center>
                        </div>
                    @elseif($error != null)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info">
                        <strong>Bienvenido</strong>
                        <br/>Aqui usted podra crear el campus, en donde podra agregarle nombre, asignarle a un encargado, direccion, etc.
                    </div>
                </div>
            </div> <!-- PARA LE MENSAJE PRINCIPAL, INFORMACION -->
            <div class="row"> <!-- PARA LOS FORMULARIO -->
                <div class="col-md-12">
                    {!!Form::open(['route' => 'adm.Campus.store', 'method' => 'POST'])!!}
                        <div class="form-group">
                            <div class="row"> <!--CAMPUS-->
                                <div class="col-md-8 col-md-offset-2">
                                    {!!Form::label('nombre','Nombre Campus',['class' => 'col-md-6'])!!}
                                    {!!Form::text('nombre','',['class' => 'col-md-6'])!!}
                                    <br>

                                    {!!Form::label('rut_encargado','Rut Encargado',['class' => 'col-md-6'])!!}
                                    {!!Form::text('rut_encargado','',['class' => 'col-md-6'])!!}
                                    <br>

                                    {!!Form::label('direccion','Dirección',['class' => 'col-md-6'])!!}
                                    {!!Form::text('direccion','',['class' => 'col-md-6'])!!}
                                    <br>

                                    {!!Form::label('latitud','Latitud',['class' => 'col-md-6'])!!}
                                    {!!Form::number('latitud','',['class' => 'col-md-6','step' => '0.001'])!!}
                                    <br>

                                    {!!Form::label('longitud','Longitud',['class' => 'col-md-6'])!!}
                                    {!!Form::number('longitud','',['class' => 'col-md-6','step' => '0.001'])!!}
                                    <br>


                                    {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                                    {!!Form::textarea('descripcion','',['class' => 'col-md-6'])!!}
                                    <br>
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
        </div>
    </div>
@endif

@if($_SERVER['REQUEST_URI'] == "/adm/crear/Facult" || $_SERVER['REQUEST_URI'] == "/adm/crear/Facults")
    <div class="panel panel-success">
        <div class="panel-body">
            @if($numero_campus == 0)
                <?php array_push($error,"Hay que ingresar primero un campus"); ?>
                @if(count($error) > 0)
                    <div class="row">
                        <div class="alert alert-danger col-md-8 col-md-offset-2">
                            OOOpss
                            <ul>
                                @foreach($error as $err)
                                    <li type="disc">{{$err}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            @else
                <div class="row">
                    <div class="col-md-12">
                        @if($mensaje != null)
                            <div class="row">
                                <div class="alert alert-success fade in col-md-8 col-md-offset-2">
                                    <a class= "close" href="#" data-dismiss="alert">x</a>
                                    <strong>Felicidades </strong>
                                    {{$mensaje}}
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    <strong>Informacion!</strong> <br/>
                                    Ingrese el numero de facultad, seguido ingrese el Campus a cual desea agregar la facultad y luego presione
                                    el boton "Generar"<br/>
                                    <strong>Ojo!</strong> <br/>
                                    Si desea cambiar el campus o ingresar denuevo el numero de facultades debe oprimir el boton "Generar"
                                </div>
                            </div>
                        </div> <!-- PARA LE MENSAJE PRINCIPAL, INFORMACION -->
                        {!!Form::open(['url' => 'adm/crear/Facult'])!!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @if($facultades == null && $id_campus == null)

                                            {!!Form::label('numero_facultad','Numero de facultad(es)',['class' => 'col-md-2'])!!}
                                            {!!Form::number('numero_facultad','',['class' => 'col-md-2'])!!}

                                            {!!Form::label('nombre_campus','Ingrese campus',['class' => 'col-md-2'])!!}
                                            {!!Form::select('id_campus',$campus,null,['class' => 'col-md-2'])!!}

                                        @else
                                            {!!Form::label('numero_facultad','Numero de facultad(es)',['class' => 'col-md-2'])!!}
                                            {!!Form::number('numero_facultad',$facultades,['class' => 'col-md-2'])!!}

                                            {!!Form::label('nombre_campus','Ingrese campus',['class' => 'col-md-2'])!!}
                                            {!!Form::select('id_campus',$campus,$id_campus,['class' => 'col-md-2'])!!}
                                        @endif

                                        {!!Form::button('Generar',['class' => 'btn btn-danger col-md-1 col-md-offset-2','type' => 'submit'])!!}

                                    </div>
                                </div>
                            </div>
                        {!!Form::close()!!}
                        @if($facultades > 3)
                            <div class="row">
                                <div class="alert alert-danger col-md-8 col-md-offset-2">
                                    OOOpss
                                    <ul>
                                        <li type="disc">No se pueden ingresar mas de 3 facultades</li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-info">
                                        Ahora ingrese el nombre de la(s) facultad(es) y la descripcion
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            {!!Form::open(['url' => 'adm/crear/Facults'])!!}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @for($i = 0;$i < $facultades;$i++)
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {!!Form::label('Nombre_facultad_'.$i.'','Nombre Facultad '.($i+1).'',['class' => 'col-md-3'])!!}
                                                        {!!Form::text('Nombre_facultad_'.$i.'','',['class' => 'col-md-3'])!!}

                                                        {!!Form::label('descripcion_facultad_'.$i.'','Descripcion',['class' => 'col-md-3'])!!}
                                                        {!!Form::textarea('Descripcion_facultad_'.$i.'','',['class' => 'col-md-3',
                                                        'rows' => '3'])!!}
                                                    </div>
                                                </div>
                                                <br/>
                                                @if(($i+1) == $facultades)
                                                    {!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-4','type' => 'submit'])!!}
                                                @endif
                                            @endfor
                                        </div>
                                        {!!Form::hidden('numero_facultad',$facultades)!!}
                                        {!!Form::hidden('id_campus',$id_campus)!!}
                                    </div>
                                </div>
                            {!!Form::close()!!}
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif

@if($_SERVER['REQUEST_URI'] == "/adm/crear/Depto" || $_SERVER['REQUEST_URI'] == "/adm/crear/Deptos")
    <div class="panel panel-success">
        <div class="panel-body">
            @if($numero_campus == 0 || $numero_facultad == 0)
                @if($numero_campus == 0)
                    <?php array_push($error,"Hay que ingresar primero un campus"); ?>
                @endif
                @if($numero_facultad == 0)
                    <?php array_push($error,"Hay que ingresar primero una facultad"); ?>
                @endif
                @if(count($error) > 0)
                    <div class="row">
                        <div class="alert alert-danger col-md-8 col-md-offset-2">
                            OOOpss
                            <ul>
                                @foreach($error as $err)
                                    <li type="disc">{{$err}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            @else
                <div class="row">
                    <div class="col-md-12">
                        @if($mensaje != null)
                            <div class="row">
                                <div class="alert alert-success fade in col-md-8 col-md-offset-2">
                                    <a class= "close" href="#" data-dismiss="alert">x</a>
                                    <strong>Felicidades </strong>
                                    {{$mensaje}}
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    <strong>Informacion!</strong> <br/>
                                    Ingrese el numero de deptos, seguido ingrese la Facultad a cual desea agregar la escuela y luego presione
                                    el boton "Generar"<br/>
                                    <strong>Ojo!</strong> <br/>
                                    Si desea cambiar el campus o ingresar denuevo el numero de facultades debe oprimir el boton "Generar"
                                </div>
                            </div>
                        </div>
                        {!!Form::open(['url' => 'adm/crear/Depto'])!!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @if($numero_departamento == null && $id_facultad == null)
                                            {!!Form::label('numero_departamento','Numero de Depto(s)',['class' => 'col-md-3'])!!}
                                            {!!Form::number('numero_departamento','',['class' => 'col-md-2'])!!}

                                            {!!Form::label('numero_facultad','Seleccione Facultad',['class' => 'col-md-3'])!!}
                                            {!!Form::select('id_facultad',$Facultades,null,['class' => 'col-md-2'])!!}
                                        @else
                                            {!!Form::label('numero_departamento','Numero de Depto(s)',['class' => 'col-md-3'])!!}
                                            {!!Form::number('numero_departamento',$numero_departamento,['class' => 'col-md-2'])!!}

                                            {!!Form::label('numero_facultad','Seleccione Facultad',['class' => 'col-md-3'])!!}
                                            {!!Form::select('id_facultad',$Facultades,$id_facultad,['class' => 'col-md-2'])!!}
                                        @endif


                                        {!!Form::button('Generar',['class' => 'btn btn-danger col-md-1 col-md-offset-1','type' => 'submit'])!!}

                                    </div>
                                </div>
                            </div>
                        {!!Form::close()!!}
                        @if($numero_departamento != null && $id_facultad != null)
                            @if($numero_departamento > 3)
                                <div class="row">
                                    <div class="alert alert-danger col-md-8 col-md-offset-2">
                                        OOOpss
                                        <ul>
                                            <li type="disc">No se pueden ingresar mas de 3 facultades</li>
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-info">
                                            Ahora ingrese el nombre de lo(s) depto(s) y la descripcion
                                        </div>
                                    </div>
                                </div>
                                {!!Form::open(['url' => 'adm/crear/Deptos'])!!}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                @for($i=0;$i<$numero_departamento;$i++)
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            {!!Form::label('Nombre_depto_'.$i.'','Nombre Depto '.($i+1).'',['class' => 'col-md-3'])!!}
                                                            {!!Form::text('Nombre_depto_'.$i.'','',['class' => 'col-md-3'])!!}

                                                            {!!Form::label('descripcion_depto_'.$i.'','Descripcion',['class' => 'col-md-3'])!!}
                                                            {!!Form::textarea('Descripcion_depto_'.$i.'','',['class' => 'col-md-3','rows' => '3'])!!}
                                                        </div>
                                                    </div>
                                                    @if(($i+1) == $numero_departamento)
                                                        <div class="row">
                                                            <div class="col-md-12">{!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-4','type' => 'submit'])!!}</div>
                                                        </div>

                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    {!!Form::hidden('numero_departamento',$numero_departamento)!!}
                                    {!!Form::hidden('id_facultad',$id_facultad)!!}
                                    {!!Form::hidden('numero_campus',$numero_campus)!!}
                                    {!!Form::hidden('numero_facultad',$numero_facultad)!!}
                                {!!Form::close()!!}
                            @endif
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif

@if($_SERVER['REQUEST_URI'] == "/adm/crear/Escuela" || $_SERVER['REQUEST_URI'] == "/adm/crear/Escuelas")
    <div class="panel panel-success">
        <div class="panel-body">
            @if($numero_campus == 0 || $numero_facultad == 0 || $numero_departamento == 0)
                @if($numero_campus == 0)
                    <?php array_push($error,"Hay que ingresar primero un campus"); ?>
                @endif
                @if($numero_facultad == 0)
                    <?php array_push($error,"Hay que ingresar primero una facultad"); ?>
                @endif
                @if($numero_departamento == 0)
                    <?php array_push($error,"Hay que ingresar primero un departamento"); ?>
                @endif
                @if(count($error) > 0)
                    <div class="row">
                        <div class="alert alert-danger col-md-8 col-md-offset-2">
                            OOOpss
                            <ul>
                                @foreach($error as $err)
                                    <li type="disc">{{$err}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            @else
                <div class="row">
                    <div class="col-md-12">
                        @if($mensaje != null)
                            <div class="row">
                                <div class="alert alert-success fade in col-md-8 col-md-offset-2">
                                    <a class= "close" href="#" data-dismiss="alert">x</a>
                                    <strong>Felicidades </strong>
                                    {{$mensaje}}
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    <strong>Informacion!</strong> <br/>
                                    Ingrese el numero de escuelas, seguido ingrese el depto a cual desea agregar la escuela y luego presione
                                    el boton "Generar"<br/>
                                    <strong>Ojo!</strong> <br/>
                                    Si desea cambiar el depto o ingresar denuevo el numero de escuelas debe oprimir el boton "Generar"
                                </div>
                            </div>
                        </div>
                            {!!Form::open(['url' => 'adm/crear/Escuela'])!!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @if($numero_escuela == null && $id_depto == null)
                                            {!!Form::label('numero_escuela','Numero de Escuela(s)',['class' => 'col-md-3'])!!}
                                            {!!Form::number('numero_escuela','',['class' => 'col-md-2'])!!}

                                            {!!Form::label('id_depto','Seleccione Depto',['class' => 'col-md-3'])!!}
                                            {!!Form::select('id_depto',$depto,null,['class' => 'col-md-2'])!!}
                                        @else
                                            {!!Form::label('numero_escuela','Numero de Escuela(s)',['class' => 'col-md-3'])!!}
                                            {!!Form::number('numero_escuela',$numero_escuela,['class' => 'col-md-2'])!!}

                                            {!!Form::label('id_depto','Seleccione Facultad',['class' => 'col-md-3'])!!}
                                            {!!Form::select('id_depto',$depto,$id_depto,['class' => 'col-md-2'])!!}
                                        @endif


                                        {!!Form::button('Generar',['class' => 'btn btn-danger col-md-1 col-md-offset-1','type' => 'submit'])!!}

                                    </div>
                                </div>
                            </div>
                            {!!Form::close()!!}
                            @if($numero_escuela != null && $id_depto != null)
                                @if($numero_escuela > 3)
                                    <div class="row">
                                        <div class="alert alert-danger col-md-8 col-md-offset-2">
                                            OOOpss
                                            <ul>
                                                <li type="disc">No se pueden ingresar mas de 3 facultades</li>
                                            </ul>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-info">
                                                Ahora ingrese el nombre de la(s) Escuela(s) y la descripcion
                                            </div>
                                        </div>
                                    </div>
                                    {!!Form::open(['url' => 'adm/crear/Escuelas'])!!}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    @for($i=0;$i<$numero_escuela;$i++)
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                {!!Form::label('Nombre_escuela_'.$i.'','Nombre Escuela '.($i+1).'',['class' => 'col-md-3'])!!}
                                                                {!!Form::text('Nombre_escuela_'.$i.'','',['class' => 'col-md-3'])!!}

                                                                {!!Form::label('descripcion_escuela_'.$i.'','Descripcion',['class' => 'col-md-3'])!!}
                                                                {!!Form::textarea('Descripcion_escuela_'.$i.'','',['class' => 'col-md-3','rows' => '3'])!!}
                                                            </div>
                                                        </div>
                                                        @if(($i+1) == $numero_escuela)
                                                            <div class="row">
                                                                <div class="col-md-12">{!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-4','type' => 'submit'])!!}</div>
                                                            </div>

                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        {!!Form::hidden('numero_escuela',$numero_escuela)!!}
                                        {!!Form::hidden('id_depto',$id_depto)!!}
                                        {!!Form::hidden('numero_campus',$numero_campus)!!}
                                        {!!Form::hidden('numero_facultad',$numero_facultad)!!}
                                        {!!Form::hidden('numero_departamento',$numero_departamento)!!}
                                    {!!Form::close()!!}
                                @endif

                            @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif

@endsection