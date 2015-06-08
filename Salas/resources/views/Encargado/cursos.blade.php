@extends('Encargado.homeEncar')

@section('content2')
@if($_SERVER['REQUEST_URI'] == "/encar/ingre/cursos/agre")
									<li class="active" class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown">
											Administrar Cursos
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
											Administrar Cursos
											<span class="caret"></span>
										</a>
										<ul class="dropdown-menu">
											<li><a href="{{url('/encar/ingre/cursos/agre')}}">Agregar</a></li>
											<li><a href="{{url('/encar/ingre/cursos/modi')}}">Modificar</a></li>
											<li><a href="{{url('/encar/ingre/cursos/elim')}}">Eliminar</a></li>
										</ul>
									</li>
							</ul>
						</div>
				  	</div>
				  	@yield('modificar')
				@endif

@endsection 

