@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Salas
            <a class="glyphicon glyphicon-menu-right"></a>
            Editar
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::model($Salas,array('route' => array('Admin.Salas.update',$Salas->id), 'method' => 'PUT')) !!}
                    <div class="form-group">

                        {!!Form::label('campus_id','Ingrese Campus',['class' => 'col-md-6'])!!}
                        {!!Form::select('campus_id',$Campus,$Salas->campus_id,['class' => 'col-md-6'])!!}

                        {!!Form::label('tipo_sala_id','Ingrese Tipo de sala',['class' => 'col-md-6'])!!}
                        {!!Form::select('tipo_sala_id',$Tposala,$Salas->tipo_sala_id,['class' => 'col-md-6'])!!}

                        {!!Form::label('nombre','Nombre Sala',['class' => 'col-md-6'])!!}
                        {!!Form::text('nombre',$Salas->nombre,['class' => 'col-md-6'])!!}

                        {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                        {!!Form::textarea('descripcion',$Salas->descripcion,['class' => 'col-md-6'])!!}

                    </div>
                    {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection