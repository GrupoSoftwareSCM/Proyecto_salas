@extends('Encargado.homeEncar')

@section('content2')


<!--AGREGAR ASIGNATURA -->
@if($_SERVER['REQUEST_URI'] == "/encar/ingre/asig/agre")
	 <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Crear Asignatura</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                 {!! Form::open(['route' => 'encar.ingre.asig.agre.store', 'method' => 'POST']) !!}
                    <form role="form">            
                        <div class="form-group">
                           {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese el nombre']) !!}
                        </div>
                         <div class="form-group">
                         {!! Form::label('codigo', 'Codigo') !!}
                            {!! Form::text('codigo', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese codigo']) !!}
                        </div>
                         <div class="form-group">
                         {!! Form::label('descripcion', 'Descripcion') !!}
                            {!! Form::text('descripcion', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese la descripcion']) !!}
                        </div>
                        <div class="form-group"> <!-- Esto no me funciona -->
                         {!! Form::label('Nombre','Pertenece a departamento')!!}
                         {!! Form::select('departamento_id',$departamento)!!}
                         </div>
                         <button type="submit" class="btn btn-success">Crear</button>
                  
                      {!! Form::close() !!}
                      </form>
            </div>  
        </div>     
@endif
@if($_SERVER['REQUEST_URI'] == "/encar/ingre/asig/modi")

                         {!!Form::open(['url' => 'encar/ingre/asig/modi'])!!}
                               <div id="dataTables-example_wrapper" 
                                class="dataTables_wrapper form-inline dt-bootstrap no-footer"
  								<div class="panel-heading">Asignaturas</div>
                                    <div class="panel-body">
                                        <table class="table table-striped">
                                            <tr>
                                              <th>#</th>
                                              <th>Nombre</th>
                                              <th>Codigo</th>
                                              <th>Pertenece a departamento</th>
                                              <th>Accion</th>
                                              <th>Accion</th>
                                            </tr>

                                           @foreach($asignatura as $Asig)
                                            <tr>
                                                <td>{{$Asig-> id_asignaturas }}</td>
                                                <td>{{$Asig-> nombre}}</td>
                                                <td>{{$Asig-> codigo}}</td>
                                                <td>{{$Asig-> departamento->nombre}}</td>
                                                <td><a href="">Editar</td><td><a href="">Eliminar</td>
                                                 
                                            </tr>
                                           @endforeach
                                        </table>
                                        {!! $asignatura->render()!!}

                                    </div>
                                    </div>
{!!Form::close()!!}

@endif
@if($_SERVER['REQUEST_URI'] == "/encar/ingre/asig/elim")
    <div class="row">
		<div class="col-md-8 col-md-offset-2"> 
			<form role="form" method="POST"> <!-- EL ACTION LO VEMOS DESPUES -->
			         <div class="form-group">
		          	<div class="col-md-8"><b><label>Indique departamento</label></b></div>
                          <div class="col-md-8"> <datalist id="depa2" class="form-contr">
                            <option value="Plan comun">
                            <option value="Informatica">
                            <option value="....">
                            <option value="....">
                         </datalist>
                    <input name="Depa2" list="depa2">
                    </div></div>
                    <br><br>
				
				  <div class="form-group">
				  <div class="col-md-8">
				   <input type="text" class="form-control" name="Nombre" placeholder="Nombre Asignatura">
                   </div></div>
		           <br><br>
		           <div class="form-group">
				  <div class="col-md-8">
		          <input type="text" class="form-control" name="Codigo" placeholder="Codigo Asignatura">
                   </div></div>
		           <br><br>
					<br><br>

				    <div class="col-md-7">
					<button type="submit" class="btn btn-danger">ELIMINAR</button>
				</div>
			</form>
		</div>
	</div>
					@endif

@endsection



<script>    
$(document).ready(function() {
    $('#table_id').dataTable( {
        "language": {
            "lengthMenu": "Mostrando _MENU_ por pagina",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando _PAGE_ de _PAGES_ paginas",
            "infoEmpty": "No se encontraron registros",
            "infoFiltered": "(Los _MAX_ datos no pertenecen a los que desea encontrar)",
             "sSearch": "Buscar:"
        }
    });

    
} );

</script>