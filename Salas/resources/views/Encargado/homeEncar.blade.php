@extends('Encargado.header')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2"> 
		<div class="panel panel-default">
			<div class="panel-body">
				@if($_SERVER['REQUEST_URI'] == "/encar")
						Bienvenido admnistrador, en esta pagina usted podra ..............................
				@endif

				@if($_SERVER['REQUEST_URI'] == "/encar/asig")
					Asignacion de salas a un respectivo curso/evento en un periodo especıfico
                   del calendario academico.
				@endif

				@if($_SERVER['REQUEST_URI'] == "/encar/modif")
					<h3>MODIFICAR SALAS</h3>
                <div class="row"> <!-- PARA LOS FORMULARIO -->
                    <div class="col-md-12">
                        <?php $array = array();?>
                        @foreach($Campus as $camp)

                            <?php $array[$camp->id_campus] = $camp->nombre?>
                        @endforeach
                        {!!Form::open(['url' => 'encar/modif'])!!}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    {!!Form::label('nombre_campus','Ingrese campus',['class' => 'col-md-2'])!!}
                                    {!!Form::select('nombre_campus',$array,null,['class' => 'col-md-3'])!!}
                                    <br><br><br>
                                    <div class="panel-heading">SALAS</div>
                                    <div class="panel-body">
                                        <table class="table table-striped">
                                            <tr>
                                              <th>#</th>
                                              <th>Nombre</th>
                                              <th>Capacidad</th>
                                              <th>Acciones</th>
                                            </tr>

                                           @foreach($Salas as $salas)
                                            <tr>
                                                <td>{{$salas-> id_salas }}</td>
                                                <td>{{$salas-> nombre}}</td>
                                                <td>{{$salas-> descripcion}}</td>
                                                <td><a href="">Editar</td>

                                            </tr>
                                           @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <br>
                          <!--  {!!Form::button('Modificar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                      -->  </div>
                        {!!Form::close()!!}
                    </div>
                </div>

				<!--	<div class="row">
						 <br><br>
						
						<div class="col-md-8 col-md-offset-2"> 
			            <form role="form" method="POST">
                        <div class="form-group">
                        <div class="col-md-8"><b>SALA</b></div>
                         <div class="col-md-8"> <datalist id="salas">
                            <option value="M1....">
                            <option value="M2....">
                            <option value="M3....">
                            <option value="M4....">
                         </datalist>
                    <input name="SALA" list="salas">
                        </div>
                        <br><br><br>

                        </div>
                        <div class="form-group">
                        <div class="col-md-8"><label for="date">CAPACIDAD</label></div>
                        <div class="col-md-8"><input type="number" value="1" min="1" max="50"></div>
                        </div>
                        <br><br><br><br>
                        <div class="form-group">
 						<div class="col-md-8"><label for="date">NOMBRE</label></div>
						<div class="col-md-8"><input type="text"</div>
						</div>
						</div>
						<br>
						<br><br>
						 <div class="btn-group">
						 <br><br><br>
                         <div class="col-md-8"><button type="button" class="btn btn-primary">ACEPTAR</button>

                        </div>
						</form>
						
					</div>
				@endif
				-->
                    <!-- MENU INGRESAR DATOS ACADEMICOS -->
				@if($_SERVER['REQUEST_URI'] == "/encar/ingre" || $_SERVER['REQUEST_URI'] == "/encar/ingre/cursos" || $_SERVER['REQUEST_URI'] == "/encar/ingre/asig" || $_SERVER['REQUEST_URI'] == "/encar/ingre/estu" || $_SERVER['REQUEST_URI'] == "/encar/ingre/estu/agre" || $_SERVER['REQUEST_URI'] == "/encar/ingre/estu/modi" || $_SERVER['REQUEST_URI'] == "/encar/ingre/estu/elim" || $_SERVER['REQUEST_URI'] == "/encar/ingre/cursos/agre" || $_SERVER['REQUEST_URI'] == "/encar/ingre/cursos/modi" || $_SERVER['REQUEST_URI'] == "/encar/ingre/cursos/elim" || $_SERVER['REQUEST_URI'] == "/encar/ingre/asig/agre" || $_SERVER['REQUEST_URI'] == "/encar/ingre/asig/modi" || $_SERVER['REQUEST_URI'] == "/encar/ingre/asig/elim")
                               	<div class="panel-body">
				  		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav nav-tabs">
								@if($_SERVER['REQUEST_URI'] == "/encar/ingre/cursos" || $_SERVER['REQUEST_URI'] == "/encar/ingre/cursos/agre" || $_SERVER['REQUEST_URI'] == "/encar/ingre/cursos/modi" || $_SERVER['REQUEST_URI'] == "/encar/ingre/cursos/elim")
									<li class="active" class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown">
											Administrar cursos
											<span class="caret"></span>
										</a>
										<ul class="dropdown-menu">
											<li><a href="{{url('/encar/ingre/cursos/agre')}}">Agregar</a></li>
											<li><a href="{{url('/encar/ingre/cursos/modi')}}">Modificar</a></li>
											<li><a href="{{url('/encar/ingre/cursos/elim')}}">Eliminar</a></li>

										</ul>
									</li>
								@else
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown">
											Administrar cursos
											<span class="caret"></span>
										</a>
										<ul class="dropdown-menu">
											<li><a href="{{url('/encar/ingre/cursos/agre')}}">Agregar</a></li>
											<li><a href="{{url('/encar/ingre/cursos/modi')}}">Modificar</a></li>
											<li><a href="{{url('/encar/ingre/cursos/elim')}}">Eliminar</a></li>
										</ul>
									</li>
									@yield('CURSOS')
								@endif
								
								@if($_SERVER['REQUEST_URI'] == "/encar/ingre/asig" || $_SERVER['REQUEST_URI'] == "/encar/ingre/asig/agre" || $_SERVER['REQUEST_URI'] == "/encar/ingre/asig/modi" || $_SERVER['REQUEST_URI'] == "/encar/ingre/elim")
									<li class="active" class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown">
											Administrar asignaturas
											<span class="caret"></span>
										</a>
										<ul class="dropdown-menu">
											<li><a href="{{url('/encar/ingre/asig/agre')}}">Agregar</a></li>
											<li><a href="{{url('/encar/ingre/asig/modi')}}">Modificar</a></li>
											<li><a href="{{url('/encar/ingre/asig/elim')}}">Eliminar</a></li>

										</ul>
									</li>
								@else
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown">
											Administrar asignaturas
											<span class="caret"></span>
										</a>
										<ul class="dropdown-menu">
											<li><a href="{{url('/encar/ingre/asig/agre')}}">Agregar</a></li>
											<li><a href="{{url('/encar/ingre/asig/modi')}}">Modificar</a></li>
											<li><a href="{{url('/encar/ingre/asig/elim')}}">Eliminar</a></li>
										</ul>
									</li>
								@endif
								@if($_SERVER['REQUEST_URI'] == "/encar/ingre/estu" || $_SERVER['REQUEST_URI'] == "/encar/ingre/estu/agre" || $_SERVER['REQUEST_URI'] == "/encar/ingre/estu/modi" || $_SERVER['REQUEST_URI'] == "/encar/ingre/estu/elim")
									<li class="active" class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown">
											Administrar estudiantes
											<span class="caret"></span>
										</a>
										<ul class="dropdown-menu">
											<li><a href="{{url('/encar/ingre/estu/agre')}}">Agregar</a></li>
											<li><a href="{{url('/encar/ingre/estu/modi')}}">Modificar</a></li>
											<li><a href="{{url('/encar/ingre/estu/elim')}}">Eliminar</a></li>

										</ul>
									</li>
								@else
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown">
											Administrar estudiante
											<span class="caret"></span>
										</a>
										<ul class="dropdown-menu">
											<li><a href="{{url('/encar/ingre/estu/agre')}}">Agregar</a></li>
											<li><a href="{{url('/encar/ingre/estu/modi')}}">Modificar</a></li>
											<li><a href="{{url('/encar/ingre/estu/elim')}}">Eliminar</a></li>
										</ul>
									</li>
								@endif

							</ul>
						</div>
				  	</div>
                 	@yield('content2')
                @endif
           		
			</div>
		</div>
	</div>
</div>

@endsection