@extends('Encargado.homeEncar')

@section('content')

     <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                       <div class="panel panel-default">
                        <h1 class="page-header"> Crear Curso</h1>
                    <div class="panel-body">

                    @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                 <p>Complete los campos</p>
                    <ul>
                    @foreach($errors->all() as $Error)
                    <li>{{$Error}}</li>
                    @endforeach
                    </ul>
                    </div>
                    @endif

                 {!! Form::open(['route' => 'encar.curs.modi.store', 'method' => 'POST']) !!}
                    <form role="form">
                        
                           <div class="form-group">

                         {!! Form::label('nombre', 'Pertenece a Asignatura: ') !!}
                         {!! Form::select('asignatura_id', $asignaturas) !!}
                        
                        </div>
                          <div class="form-group">

                         {!! Form::label('nombre', 'Pertenece a  Docente: ') !!}
                         {!! Form::select('docente_id', $docentes) !!}
                        
                        </div>
                        
                       <div class="form-group">
                           {!! Form::label('semestre', 'Semestre') !!}
                            {!! Form::text('semestre', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese el semestre']) !!}
                        </div>
                        <div class="form-group">
                           {!! Form::label('anio', 'Año') !!}
                            {!! Form::text('anio', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese el año']) !!}
                        </div>
                         <div class="form-group">
                         {!! Form::label('seccion', 'Seccion') !!}
                            {!! Form::text('seccion', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese la seccion']) !!}
                        </div>

                           

                         <button type="submit" class="btn btn-info">Crear</button>
                         <a class="btn btn-danger" href="{{url('encar/curs/modi')}}" role="button">Cancelar</a>
                  
                      {!! Form::close() !!}
                       </form>
                      </div>
                      </div>
                      </div>
                      </div>
                      </div>

@endsection