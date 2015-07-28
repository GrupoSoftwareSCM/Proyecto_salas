@extends('Encargado.homeEncar')

@section('content')


 <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                       <div class="panel panel-default">
                        <h1 class="page-header"> Asignar Sala</h1>
                    <div class="panel-body">

              <h1>CAMPUS : {{$campus->nombre}}</h1>
              <h1>CANTIDAD DE ALUMNOS: {{$cantidad_alumno}}</h1>
              <h2>SECCION: {{$cursoo->seccion}}</h2>
          
          <?php   $Dias= array('lunes'=>'Lunes','martes'=>'Martes','miercoles'=>'Miercoles','jueves'=>'Jueves','viernes'=>'Viernes','sabado'=>'Sabado');?>
       
             
               
               
          {!!Form::open(['route' => 'encar.asignar.modi.store', 'method' => 'POST'])!!}
                                
                               <div id="dataTables-example_wrapper" 
                                class="dataTables_wrapper form-inline dt-bootstrap no-footer"
                  <div class="panel-heading"><h1>SALAS</h1></div>
                                    <div class="panel-body">
                          <div class="form-group">
                         {!! Form::label('dias','Lunes')!!}
                         {!! Form::checkbox('dias[]',1,null,['class' => 'field'])!!}
                         {!! Form::label('dias','Martes')!!}
                         {!! Form::checkbox('dias[]',2,null,['class' => 'field'])!!}
                         {!! Form::label('dias','Miercoles')!!}
                         {!! Form::checkbox('dias[]',3,null,['class' => 'field'])!!}
                         {!! Form::label('dias','Jueves')!!}
                         {!! Form::checkbox('dias[]',4,null,['class' => 'field'])!!}
                         {!! Form::label('dias','Viernes')!!}
                         {!! Form::checkbox('dias[]',5,null,['class' => 'field'])!!}
                         {!! Form::label('dias','Sabado')!!}
                         {!! Form::checkbox('dias[]',6,null,['class' => 'field'])!!}
                        

                         </div>  
                         <div class="form-group">
                         {!! Form::label('sala_id','Salas')!!}
                         {!! Form::select('sala_id',$sa)!!}

                         </div>
                              <div class="form-group"> 
                         {!! Form::label('periodo_id','Periodo')!!}
                         {!! Form::select('periodo_id',['-1' => 'Selecciona un Período']+ $periodos)!!}
                         </div>
                         <div>
                         {!! Form::hidden('curso_id', $cursoo->id)!!}
                          
                         </div>
                         <div>  <button type="submit" class="btn btn-info">Crear</button></div>
                                      
                                    </div>
                                    </div>
                                    </div>
                                  
{!!Form::close()!!}
@endsection
            </div>  
          </div>
        </div>  
    </div>
</div>   
@endsection