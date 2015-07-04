@extends('Encargado.homeEncar')

@section('content')

     <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                       <div class="panel panel-default">
                        <h1 class="page-header"> Crear Estudiante</h1>
                    <div class="panel-body">
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                <p>Ingrese los campos</p>
                @foreach($errors->all() as $Error)
                <li>{{$Error}}</li>
               @endforeach
               </div>
               @endif
              @foreach($carreras as $Carre)
                     <?php $array[$Carre->id_carreras] = $Carre->nombre?>
             @endforeach
                 {!! Form::open(['route' => 'encar.estu.modi.store', 'method' => 'POST']) !!}
                    <form role="form">            
                        <div class="form-group">
                           {!! Form::label('nombres', 'Nombres') !!}
                            {!! Form::text('nombres', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese nombres']) !!}
                        </div>
                         <div class="form-group">
                         {!! Form::label('apellidos', 'Apellidos') !!}
                            {!! Form::text('apellidos', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese apellidos']) !!}
                        </div>
                         <div class="form-group">
                         {!! Form::label('rut', 'Rut') !!}
                            {!! Form::text('rut', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese el rut sin puntos ni comas']) !!}
                        </div>
                         <div class="form-group">
                         {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese email']) !!}
                        </div>
                       
                         <div class="form-group"> <!-- Esto no me funciona -->
                         {!! Form::label('carrera_id','Carrera')!!}
                         {!! Form::select('carrera_id',$array)!!}
                         </div>
                        
                         <button type="submit" class="btn btn-info">Crear</button>
                     
                         <a class="btn btn-danger" href="{{url('encar/estu/modi')}}" role="button">Cancelar
                         </a>

                      {!! Form::close() !!}
                      </form>
                    </div>  
                </div>  
            </div>
      </div>   
@endsection