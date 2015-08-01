@extends('Encargado.homeEncar')

@section('content')

     <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                       <div class="panel panel-default">
                        <h1 class="page-header"> Crear Docente</h1>
                    <div class="panel-body">
        

                 {!! Form::open(['route' => 'encar.doce.modi.store', 'method' => 'POST']) !!}
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
                         {!! Form::label('departamento_id','Departamento')!!}
                         {!! Form::select('departamento_id',$depa)!!}
                         </div>
                        
                         <button type="submit" class="btn btn-info">Crear</button>
                     
                         <a class="btn btn-danger" href="{{url('encar/doce/modi')}}" role="button">Cancelar
                         </a>

                      {!! Form::close() !!}
                      </form>
                       <div class="col-md-6">
                        {!!Form::open(['route' => 'files.DoceEncar.up','method' => 'POST','enctype' =>'multipart/form-data'])!!}
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