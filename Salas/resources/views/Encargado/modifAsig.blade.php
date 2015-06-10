@extends('Encargado.homeEncar')

@section('content2')


<!--AGREGAR ASIGNATURA -->
@if($_SERVER['REQUEST_URI'] == "/encar/ingre/asig/agre")
	<div class="row">
		<div class="col-md-8 col-md-offset-2"> 
			<form role="form" method="POST"> <!-- EL ACTION LO VEMOS DESPUES -->
			         <div class="form-group">
		          	<div class="col-md-8"><b><label>Indique departamento</label></b></div>
                          <div class="col-md-8"> <datalist id="depa" class="form-contr">
                            <option value="Plan comun">
                            <option value="Informatica">
                            <option value="....">
                            <option value="....">
                         </datalist>
                    <input name="Depa" list="depa">
                    </div></div>
                    <br><br><br>
				  <div class="form-group">
				  <div class="col-md-8">
		          <input type="text" class="form-control" name="Codigo" placeholder="Codigo Asignatura">
                   </div></div>
		           <br><br>
		           <div class="form-group">
				  <div class="col-md-8">
		          <input type="text" class="form-control" name="Nombre" placeholder="Nombre Asignatura">
                   </div></div>
		           <br><br>
		           <div class="form-group">
                   <div class="col-md-7">
					<textarea name="Descripcion" rows="10" cols="37" placeholder="Descripcion"></textarea>
					</div>
					</div>	
					<br><br><br><br><br><br><br><br><br>
   		           <div class="form-group">
   		           <br><br><br>
				    <div class="col-md-7">
					<button type="submit" class="btn btn-danger">Agregar</button>
					<br><br><br>
				</div></div>
			</form>
		</div>
	</div>
@endif
@if($_SERVER['REQUEST_URI'] == "/encar/ingre/asig/modi")
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
                    <br><br> <br>			
				  <div class="form-group">
				  <div class="col-md-8">
				   <input type="text" class="form-control" name="Nombre" placeholder="Nombre Asignatura">
                   </div></div>
		           <br><br>
		           <div class="form-group">
				  <div class="col-md-8">
		          <input type="text" class="form-control" name="Codigo" placeholder="Codigo Asignatura">
                   </div></div>
		           <br> <br>
					<div class="col-md-7">
						<textarea name="Descripcion" rows="10" cols="37" placeholder="Descripcion"></textarea>
					</div>
                    <br><br>
					<br><br>
					<br><br><br><br><br><br><br><br> <br>
				    <div class="col-md-7">
					<button type="submit" class="btn btn-danger">Modificar</button>
				</div>
			</form>
		</div>
	</div>
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
