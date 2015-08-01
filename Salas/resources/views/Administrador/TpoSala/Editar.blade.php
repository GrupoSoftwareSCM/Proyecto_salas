@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Tipo salas
            <a class="glyphicon glyphicon-menu-right"></a>
            Editar
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::model($TpoSalas,array('route' => array('Admin.TpoSala.update',$TpoSalas->id), 'method' => 'PUT')) !!}
                    <div class="form-group">

                        {!!Form::label('nombre','Nombre Campus',['class' => 'col-md-6'])!!}
                        {!!Form::text('nombre',$TpoSalas->nombre,['class' => 'col-md-6'])!!}

                        {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                        {!!Form::textarea('descripcion',$TpoSalas->descripcion,['class' => 'col-md-6'])!!}

                    </div>
                    {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection