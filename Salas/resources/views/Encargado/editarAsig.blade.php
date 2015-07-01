@extends('Encargado.homeEncar')

@section('content')

<div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Editar Asignatura</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                  
                {!! Form::model($asig, ['route' => ['encar.asig.modi.update', $asig],'method' => 'PUT']) !!}
                    <form role="form">            
                        <div class="form-group">

                         {!! Form::label('nombre', 'Pertenece al departamento: ') !!}
                         {!! Form::select('id_departamentos', $depa) !!}
                        
                        </div>
                         <div class="form-group">
                         {!! Form::label('nombre', 'Nombre') !!}
                         {!! Form::text('nombre',null,['class' => 'form-control',
                             'placeholder' => '$asig->nombre']) !!}
                        </div>
                         <div class="form-group">
                         {!! Form::label('codigo', 'Codigo') !!}
                            {!! Form::text('codigo',null,['class' => 'form-control',
                             'placeholder' => '$asig->codigo']) !!}
                        </div>
                        <div class="form-group">
                         {!! Form::label('descripcion', 'Descripcion') !!}
                            {!! Form::text('descripcion',null,['class' => 'form-control',
                             'placeholder' => '$asig->descripcion']) !!}
                        </div>
                        
                        
                        <div>
                         <button type="submit" class="btn btn-success">Modificar</button>
                         </div>
                         <div>
                         <a class="btn btn-danger" href="{{ URL::previous() }}" role="button">Cancelar
                         </a></div>

                      {!! Form::close() !!}
                      </form>
            </div>  
        </div>
        {!! Form::open(['route' => ['encar.asig.modi.destroy', $asig], 'method' => 'DELETE']) !!}
                      
                    <button type="submit" onclick="return confirm('Seguro que desea eliminar el curso?')"
                   class="btn btn-danger">Eliminar </button>

                    {!! Form::close() !!}     
@endsection