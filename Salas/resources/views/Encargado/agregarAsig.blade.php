@extends('Encargado.homeEncar')

@section('content')

<div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Crear Asignatura</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
              @foreach($departamento as $Depa)
                     <?php $array[$Depa->id_departamentos] = $Depa->nombre?>
             @endforeach
                 {!! Form::open(['route' => 'encar.asig.modi.store', 'method' => 'POST']) !!}
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
                         {!! Form::label('depa','Pertenece a departamento')!!}
                         {!! Form::select('depa',$array)!!}
                         </div>
                        
                        <div>
                         <button type="submit" class="btn btn-success">Crear</button>
                         </div>
                         <div>
                         <a class="btn btn-danger" href="{{ URL::previous() }}" role="button">Cancelar
                         </a></div>

                      {!! Form::close() !!}
                      </form>
            </div>  
        </div>     
	@endsection