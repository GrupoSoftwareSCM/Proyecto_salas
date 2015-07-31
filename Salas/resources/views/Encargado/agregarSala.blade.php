@extends('Encargado.homeEncar')

@section('content')

     <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-1">
                       <div class="panel panel-default">
                        <h1 class="page-header"> Crear Sala</h1>
                    <div class="panel-body">
        

                 {!! Form::open(['route' => 'encar.salas.modi.store', 'method' => 'POST']) !!}
                    <form role="form">            
                        <div class="form-group">
                           {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese nombre']) !!}
                        </div>
                                                           
                         <div class="form-group"> 
                         {!! Form::label('campus_id','Campus')!!}
                         {!! Form::select('campus_id',$campus)!!}
                         </div>
                             <div class="form-group"> 
                         {!! Form::label('tipo_sala_id','Tipo de Sala')!!}
                         {!! Form::select('tipo_sala_id',$tipo)!!}
                         </div>
                            <div class="form-group">
                         {!! Form::label('descripcion', 'Descripcion') !!}
                            {!! Form::textarea('descripcion', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese la descripcion']) !!}
                        </div>
                         <div class="form-group">
                         {!! Form::label('capacidad', 'Capacidad') !!}
                         {!! Form::text('capacidad', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese la capacidad']) !!}
                        </div>
                        
                         <button type="submit" class="btn btn-info">Crear</button>
                     
                         <a class="btn btn-danger" href="{{url('encar/salas/modi')}}" role="button">Cancelar
                         </a>

                      {!! Form::close() !!}
                      </form>
                      <div class="col-md-6">
                        {!!Form::open(['route' => 'files.SalasEncar.up','method' => 'POST','enctype' =>'multipart/form-data'])!!}
                        <div class="form-group">
                            {!!Form::label('file','Adjuntar archivo',['class' => 'col-md-6'])!!}
                            <br/>
                            <input type="file" name="file">

                        </div>
                        {!!Form::button('Enviar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                    </div>  
                </div>  
            </div>
      </div>   
@endsection