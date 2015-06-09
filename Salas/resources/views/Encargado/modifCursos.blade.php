@extends('Encargado.homeEncar')

@section('content2')



@if($_SERVER['REQUEST_URI'] == "/encar/ingre/cursos/agre")
	<div class="row">
		<div class="col-md-8 col-md-offset-2"> 
			<form role="form" method="POST"> <!-- EL ACTION LO VEMOS DESPUES -->
				<div class="form-group">
	        		   <div class="col-md-8">SEMESTRE</div>
	        		   <div class="col-md-8" >
					<input type="radio" name="sex" value="male" checked>Primer semestre
					<br>
					<input type="radio" name="sex" value="female">Segundo semestre
					</form>
				    </div>
				    </div>
					<br>
					<br>
					<br>
					<br>
					<div class="form-group">
					<div class="col-md-8">
						<input type="number" class="form-control" name="anio" placeholder="AÑO" min="1995" max="2016">
					</div></div>
					<br>
					<br>
					<br>
					<br>
					<div class="form-group">
					<div class="col-md-8">
						<input type="number" class="form-control" name="seccion" placeholder="SECCION" min="1" max="10">
					</div></div>
					<br>
					<br>
					<br>
					<br>
		          	<div class="form-group">
		          	<div class="col-md-8"><b>Asignatura</b></div>
                          <div class="col-md-8"> <datalist id="asig" class="form-contr">
                            <option value="lenguaje">
                            <option value="matematica">
                            <option value="....">
                            <option value="....">
                         </datalist>
                    <input name="Asig" list="asig">
                    </div></div>
                    <br><br>
					<br><br>
		            <div class="form-group">
		          	<div class="col-md-8"><b>Docente</b></div>
                          <div class="col-md-8"> <datalist id="doc" class="form-contr">
                            <option value="Marta rojas">
                            <option value="Corbinaud">
                            <option value="....">
                            <option value="....">
                         </datalist>
                    <input name="Doc" list="doc">
                    </div>
                    </div>
                    <br><br><br>
                   
				    <div class="col-md-7">
					<button type="submit" class="btn btn-danger">Agregar</button>
				</div>
			</form>
		</div>
	</div>
@endif
@if($_SERVER['REQUEST_URI'] == "/encar/ingre/cursos/modi")
    <div class="row">
		<div class="col-md-8 col-md-offset-2"> 
			<form role="form" method="POST"> <!-- EL ACTION LO VEMOS DESPUES -->
				<div class="form-group">               
                      <div class="col-md-8"><b>Indique la asignatura del curso a  modificar </b></div>
                          <div class="col-md-8"> <datalist id="asig2" class="form-contr">
                            <option value="lenguaje">
                            <option value="matematica">
                            <option value="....">
                            <option value="....">
                         </datalist>
                    <input name="Asig2" list="asig2">
                    </div>
                    <br><br>
					<br><br>
					<div class="form-group">
					<div class="col-md-8"><b>Indique el docente que dicta dicha asignatura </b></div>
                          <div class="col-md-8"> <datalist id="prof" class="form-contr">
                            <option value="martita">
                            <option value="sarita">
                            <option value="....">
                            <option value="....">
                         </datalist>
                    <input name="Prof" list="prof">
                    </div>
                    <br><br>
					<br><br>
					<div class="form-group">
					 <div class="col-md-8" ><b>Semestre </b><br>
					<input type="radio" name="sex" value="male" checked>Primer semestre
					<br>
					<input type="radio" name="sex" value="female">Segundo semestre
				    </div>
				    </div>
					<br><br>
					<br><br>
					<div class="form-group">
					<div class="col-md-8">
					<input type="number" class="form-control" name="anio" placeholder="AÑO" min="1995" max="2016">
					</div></div>
					<br><br>
					<br><br>
					<div class="form-group">
					<div class="col-md-8">
					<input type="number" class="form-control" name="seccion" placeholder="SECCION" min="1" max="10">
					</div></div>
					<br><br>
					<br>
					<br>
			
					
			
					<div class="col-md-7">
					<button type="submit" class="btn btn-danger">MODIFICAR</button>
				</div>
					</div>
					</form>
					</div>
					</div>
@endif
@if($_SERVER['REQUEST_URI'] == "/encar/ingre/cursos/elim")
 <div class="row">
		<div class="col-md-8 col-md-offset-2"> 
			<form role="form" method="POST">
				<div class="form-group">               
                      <div class="col-md-8"><b>Indique la asignatura del curso a  modificar </b></div>
                                     <div class="col-md-8"> <datalist id="asig2" class="form-contr">
                            <option value="lenguaje">
                            <option value="matematica">
                            <option value="....">
                            <option value="....">
                         </datalist>
                    <input name="Asig2" list="asig2">
                    </div>
                    </div>
                    <br><br>
					<br><br>
					<div class="form-group">
					<div class="col-md-8"><b>Indique el docente que dicta dicha asignatura </b></div>
                          <div class="col-md-8"> <datalist id="prof" class="form-contr">
                            <option value="martita">
                            <option value="sarita">
                            <option value="....">
                            <option value="....">
                         </datalist>
                    <input name="Prof" list="prof">
                    </div>
                    </div>
                    <br><br>
					<br><br>

					<div class="col-md-8">
					<button type="submit" class="btn btn-danger">ELIMINAR</button>
					</div>
					</div>
					</form>
					</div>
					</div>
					@endif

@endsection
