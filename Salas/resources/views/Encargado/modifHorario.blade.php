@extends('Encargado.homeEncar')

@section('content9')

     <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-1">
                       <div class="panel panel-default">
                        <h1 class="page-header"> Horarios </h1>
                    <div class="panel-body">


                 {!! Form::open(['route' => 'encar.hora.modi.store', 'method' => 'POST']) !!}
                    <form role="form">
                        
                           <div class="form-group">

                         {!! Form::label('campus', 'Pertenece a Campus: ') !!}
                         {!! Form::select('campus', $campus) !!}
                        
                        </div>
                         <div class="form-group">
                         {!! Form::label('fecha','Ingrese fecha:')!!}
                         {!! Form::date('fecha', \Carbon\Carbon::now())!!}
                          </div>
                          <div class="form-group">

                         {!! Form::label('periodo', 'Pertenece a  periodo: ') !!}
                         {!! Form::select('periodo', $periodo) !!}
                        
                        </div>
                                    

                         <button type="submit" class="btn btn-info">siguiente</button>
                         <a class="btn btn-danger" href="{{url('encar/curs/modi')}}" role="button">Cancelar</a>
                  
                      {!! Form::close() !!}
                       </form>
                      </div>
                      </div>
                      </div>
                      </div>
                      </div>

@endsection