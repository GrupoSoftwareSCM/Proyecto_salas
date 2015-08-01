@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Campus
            <a class="glyphicon glyphicon-menu-right"></a>
            Editar
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::model($Campus,array('route' => array('Admin.Campus.update',$Campus->id), 'method' => 'put')) !!}
                    <div class="form-group">

                        {!!Form::label('nombre','Nombre Campus',['class' => 'col-md-6'])!!}
                        {!!Form::text('nombre',$Campus->nombre,['class' => 'col-md-6'])!!}

                        {!!Form::label('direccion','Direccion',['class' => 'col-md-6'])!!}
                        {!!Form::text('direccion',$Campus->direccion,['class' => 'col-md-6'])!!}

                        {!!Form::label('latitud','Latitud',['class' => 'col-md-6'])!!}
                        {!!Form::number('latitud',$Campus->latitud,['class' => 'col-md-6','step' => '0.001'])!!}

                        {!!Form::label('longitud','Longitud',['class' => 'col-md-6'])!!}
                        {!!Form::number('longitud',$Campus->longitud,['class' => 'col-md-6','step' => '0.001'])!!}

                        {!!Form::label('rut_encargado','Rut Encargado',['class' => 'col-md-6'])!!}
                        {!!Form::text('rut_encargado',$Campus->rut_encargado,['class' => 'col-md-6'])!!}

                        {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                        {!!Form::textarea('descripcion',$Campus->descripcion,['class' => 'col-md-6'])!!}

                    </div>
                    {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection