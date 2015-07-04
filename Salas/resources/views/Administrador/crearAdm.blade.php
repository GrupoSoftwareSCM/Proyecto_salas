@extends('Administrador.homeAdm')

@section('createBody')

    <div class="panel panel-success">
        <div class="panel-body">
            Campus
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-6">
                    {!!Form::open(['route' => 'Admin.Campus.store','method' => 'POST'])!!}
                        <div class="form-group">

                            {!!Form::label('nombre','Nombre Campus',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombre','',['class' => 'col-md-6'])!!}

                            {!!Form::label('direccion','Direccion',['class' => 'col-md-6'])!!}
                            {!!Form::text('direccion','',['class' => 'col-md-6'])!!}

                            {!!Form::label('latitud','Latitud',['class' => 'col-md-6'])!!}
                            {!!Form::number('latitud','',['class' => 'col-md-6','step' => '0.001'])!!}

                            {!!Form::label('longitud','Longitud',['class' => 'col-md-6'])!!}
                            {!!Form::number('longitud','',['class' => 'col-md-6','step' => '0.001'])!!}

                            {!!Form::label('rut_encargado','Rut Encargado',['class' => 'col-md-6'])!!}
                            {!!Form::text('rut_encargado','',['class' => 'col-md-6'])!!}

                            {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                            {!!Form::textarea('descripcion','',['class' => 'col-md-6'])!!}

                        </div>
                    {!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection