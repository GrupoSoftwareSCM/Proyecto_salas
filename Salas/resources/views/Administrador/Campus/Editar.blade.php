@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            {!! Html::linkRoute('Admin.Campus.index','Campus') !!}
            <a class="glyphicon glyphicon-menu-right"></a>
            Editar
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::model($Campus,array('route' => array('Admin.Campus.update',$Campus->id), 'method' => 'put','class'=>'form-horizontal')) !!}
                    <div class="form-group">

                        {!!Form::label('nombre','Nombre Campus',['class' => 'control-label'])!!}
                        {!!Form::text('nombre',$Campus->nombre,['class' => 'form-control'])!!}

                        {!!Form::label('direccion','Direccion',['class' => 'control-label'])!!}
                        {!!Form::text('direccion',$Campus->direccion,['class' => 'form-control'])!!}

                        {!!Form::label('latitud','Latitud',['class' => 'control-label'])!!}
                        {!!Form::number('latitud',$Campus->latitud,['class' => 'form-control','step' => '0.001'])!!}

                        {!!Form::label('longitud','Longitud',['class' => 'control-label'])!!}
                        {!!Form::number('longitud',$Campus->longitud,['class' => 'form-control','step' => '0.001'])!!}

                        {!!Form::label('rut_encargado','Rut Encargado',['class' => 'control-label'])!!}
                        {!!Form::text('rut_encargado',$Campus->rut_encargado,['class' => 'form-control'])!!}

                        {!!Form::label('descripcion','Descripcion',['class' => 'control-label'])!!}
                        {!!Form::textarea('descripcion',$Campus->descripcion,['class' => 'form-control'])!!}

                    </div>
                    {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection