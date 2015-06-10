@extends('Encargado.homeEncar')

@section('content2')
@if($_SERVER['REQUEST_URI'] == "/encar/ingre/estu/agre")
<div class="row">
		<div class="col-md-8 col-md-offset-2"> 
			<form role="form" method="POST"> <!-- EL ACTION LO VEMOS DESPUES -->
				<div class="form-group">
					<div class="col-md-8">
						<input type="text" class="form-control" name="NombresEstu" placeholder="Nombres">
					</div>
					<br>
					<br>
					</div>
					<div class="form-group">
					<div class="col-md-8">
						<input type="text" class="form-control" name="Apellidos" placeholder="Apellidos">
					</div>
					</div>
					<br>
					<br>
					<br>
	                <div class="form-group">
					<div class="col-md-8">
					<input type="text" class="form-control" name="rut" size="9" maxlength="8" placeholder="Rut sin puntos ni dijito verificador"> 
					</div></div>
					<br>
					<br>
				
					 <div class="form-group">
					<div class="col-md-8">
					<input type="mail" class="form-control" name="correo" placeholder="email@ejemplo.cl"> 
					</div></div>
					<br>
					<br>
					<br>
					<div class="form-group">
					<div class="col-md-8"><b><layed>Carrera</layed></b></div>
                          <div class="col-md-8" class="form-control"> <datalist id="carr" class="form-contr">
                            <option value="21030">
                            <option value="21041">
                            <option value="....">
                            <option value="....">
                         </datalist>
                    <input name="Carr" list="carr">
                    </div>
                    </div>
                    <br><br>
					<br><br>
				<div class="form-group">
				<div class="col-md-7">
					<button type="submit" class="btn btn-danger">Agregar</button>
					<br>
					<br>
				</div>
				</div>
		
			</form>
		</div>
	</div>

@endif
@if($_SERVER['REQUEST_URI'] == "/encar/ingre/estu/modi")
<div class="row">
		<div class="col-md-8 col-md-offset-2"> 
			<form role="form" method="POST"> <!-- EL ACTION LO VEMOS DESPUES -->
				<div class="form-group">
					<div class="col-md-8"><layed><b>Ingrese el rut del estudiante que desea modificar</b></layed>
					    <input type="text" class="form-control" name="rut2" size="9" maxlength="8" placeholder="Rut sin puntos ni dijito verificador">
					</div>
					<br>
					<br>
					<br>
					<br>
					</div>
					<div class="form-group">
					<div class="col-md-8">
					<input type="text" class="form-control" name="NombresEstu2" placeholder="Nombres">
					</div>
					</div>
					<br>
					<br>
					<br>
	                <div class="form-group">
					<div class="col-md-8">
					 <input type="text" class="form-control" name="Apellidos2" placeholder="Apellidos">
					</div></div>
					<br>
					<br>
					 <div class="form-group">
					<div class="col-md-8">
					<input type="mail" class="form-control" name="correo2" placeholder="email@ejemplo.cl"> 
					</div></div>
					<br>
					<br>
					<br>
					<div class="form-group">
					<div class="col-md-8"><b><layed>Carrera</layed></b></div>
                          <div class="col-md-8" class="form-control"> <datalist id="carr2" class="form-contr">
                            <option value="21030">
                            <option value="21041">
                            <option value="....">
                            <option value="....">
                         </datalist>
                    <input name="Carr2" list="carr2">
                    </div>
                    </div>
                    <br><br>
					<br><br>
				<div class="form-group">
				<div class="col-md-7">
					<button type="submit" class="btn btn-danger">Actualizar</button>
					<br>
					<br>
				</div>
				</div>
		
			</form>
		</div>
	</div>

@endif
@if($_SERVER['REQUEST_URI'] == "/encar/ingre/estu/elim")
<div class="row">
		<div class="col-md-8 col-md-offset-2"> 
			<form role="form" method="POST"> <!-- EL ACTION LO VEMOS DESPUES -->
				<div class="form-group">
					<div class="col-md-8"><layed><b>Ingrese el rut del estudiante que desea eliminar</b></layed>
					    <input type="text" class="form-control" name="rut3" size="9" maxlength="8" placeholder="Rut sin puntos ni dijito verificador">
					</div>
					<br>
					<br>
					<br>
					<br>
					</div>
					<div class="form-group">
					<div class="col-md-8">
					<input type="text" class="form-control" name="NombresEstu3" placeholder="Nombres">
					</div>
					</div>
					<br>
					<br>
					<br>
	                <div class="form-group">
					<div class="col-md-8">
					 <input type="text" class="form-control" name="Apellidos3" placeholder="Apellidos">
					</div></div>
					<br>
					<br>
					 <div class="form-group">
					<div class="col-md-8">
					<input type="mail" class="form-control" name="correo3" placeholder="email@ejemplo.cl"> 
					</div></div>
					<br>
					<br>
					<div class="form-group">
					<div class="col-md-8"><b><layed>Carrera</layed></b></div>
                          <div class="col-md-8" class="form-control"> <datalist id="carr3" class="form-contr">
                            <option value="21030">
                            <option value="21041">
                            <option value="....">
                            <option value="....">
                         </datalist>
                    <input name="Carr3" list="carr3">
                    </div>
                    </div>
                    <br><br>
					<br><br>
				<div class="form-group">
				<div class="col-md-7">
					<button type="submit" class="btn btn-danger">Eliminar</button>
					<br>
					<br>
				</div>
				</div>
		
			</form>
		</div>
	</div>

@endif
@endsection