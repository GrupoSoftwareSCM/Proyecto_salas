@extends('Docente.homeDoc')


@section('consultar')

<!--	CLASES DEL DOCENTE	-->
@if($_SERVER['REQUEST_URI'] == "/doc/clases")
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<table id="sample-table-1" class="table table-striped table-bordered table-hover">
		            <h1>

		            </h1>
		            <thead>
		                <tr>
		                    <th class="center" ></th>
		                    <th class="center" width="150px"><center>Lunes</center></th>
		                    <th class="center" width="150px"><center>Martes</center></th>
		                    <th class="center" width="150px"><center>Miércoles</center></th>
		                    <th class="center" width="150px"><center>Jueves</center></th>
		                    <th class="center" width="150px"><center>Viernes</center></th>
		                    <th class="center" width="150px"><center>Sábado</center></th>
		                </tr>
		            </thead>
		            <tbody>
		                <tr class="programa">
		                    <td align="center">08:00 - 09:30 - I</td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                </tr>
		                <tr class="programa">
		                    <td align="center">09:40 - 11:10 - II</td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>                    
		                </tr>
		                <tr class="programa">
		                    <td align="center">11:20 - 12:50 - III</td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
		                </tr>
		                <tr class="programa">
		                    <td align="center">13:00 - 14:30 - IV</td>
		                     <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
		                </tr>    
		                <tr class="programa">
		                    <td align="center">14:40 - 16:10 - V</td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
		                </tr>
		                <tr class="programa">
		                    <td align="center">16:20 - 17:50 - VI</td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>         
		                </tr>
		                <tr class="programa">
		                    <td align="center">18:00 - 19:30 - VII</td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>             
		                </tr>    
						<tr class="programa">
		                    <td align="center">19:00 - 20:30 - VIII</td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		                    <td class="td" align="center" ></td>
		            </tbody>
		    </table>
    	</div>
    </div>
@endif

<!--	CONSULTAS DE SALAS POR CAMPUS	-->
@if($_SERVER['REQUEST_URI'] == "/doc/salas")
	<div><h3>¿Que sala desea consultar?</div></h3>				
    <div>
    <br>	
    </div>
    <div class="row"> 
    <div class="col-md-8">
    	
        <div class="form-group"> <div class="col-md-8"> <b>CAMPUS</b></div>
        <div class="col-md-4"> <datalist id="listas">
            <option value="Macul">
            <option value="Fae">
            <option value="390">
            <option value="Casa central">
         </datalist>
    <input name="Campus" list="listas">
    </div>
      </div> 
          <div class="form-group"><div class="col-md-8"> <b> DIA </b></div>   
          <div class="col-md-4"><datalist id="listas2">
            <option value="Lunes">
            <option value="Martes">
            <option value="Miercoles">
            <option value="Jueves">
            <option value="Viernes">
            <option value="Sabado">
         </datalist>
    <input name="Dia" list="listas2">
     </div>
       </div>
          <div class="form-group"> <div class="col-md-8"> <b>PERIODO</b></div>   
         <div class="col-md-4"><datalist id="listas3">
            <option value="08:00 - 9:30">
            <option value="09:45 - 11:10">
            <option value="11:20 - 12:50">
            <option value="13:00 - 14:30">
            <option value="14:40 - 16:10">
            <option value="16:20 - 17:50">
            <option value="18:00 - 19:30">
            <option value="19:40 - 21:10">
         </datalist>
    <input name="Periodo" list="listas3">
    </div>
    </div>
    </form>

    </div>
    </div>
     <br><br>
@endif


@endsection