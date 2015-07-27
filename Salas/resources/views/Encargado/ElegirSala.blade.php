@extends('Encargado.homeEncar')

@section('content')


 <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                       <div class="panel panel-default">
                        <h1 class="page-header"> Asignar Sala</h1>
                    <div class="panel-body">

              <h1>CAMPUS : {{$campus->nombre}}</h1>
              <h1>CANTIDAD DE ALUMNO: {{$cantidad_alumno}}
               
              		
              @foreach($salasCampus as $salas)

          
              <?php $array[$salas->id] = $salas->nombre?> 
   
              @endforeach
              @foreach($periodos as $pe)
              <?php $arrays[$pe->id]= $pe->bloque?>

              @endforeach
          {!!Form::open(['route' => 'encar.asignar.modi.edit', 'method' => 'GET'])!!}
                                
                               <div id="dataTables-example_wrapper" 
                                class="dataTables_wrapper form-inline dt-bootstrap no-footer"
                  <div class="panel-heading"><h1>SALAS</h1></div>
                                    <div class="panel-body">
                                    
                         <div class="form-group"> <!-- Esto no me funciona -->
                         {!! Form::label('salasa','Salas')!!}
                         {!! Form::select('salasa',$array)!!}

                         </div>
                              <div class="form-group"> <!-- Esto no me funciona -->
                         {!! Form::label('periodo','Periodo')!!}
                         {!! Form::select('periodo',['-1' => 'Selecciona un Período']+ $probando)!!}

                         </div>
                                      
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