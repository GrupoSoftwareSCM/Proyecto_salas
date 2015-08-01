@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Facultad
            <a class="glyphicon glyphicon-menu-right"></a>
            Editar
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::model($Facultad,array('route' => array('Admin.Facultad.update',$Facultad->id), 'method' => 'put')) !!}
                    <div class="form-group">

                        {!!Form::label('id_campus','Ingrese Campus',['class' => 'col-md-6'])!!}
                        {!!Form::select('campus_id',$Campus,$Facultad->campus_id,['class' => 'col-md-6'])!!}

                        {!!Form::label('nombre','Nombre Facultad',['class' => 'col-md-6'])!!}
                        {!!Form::text('nombre',$Facultad->nombre,['class' => 'col-md-6'])!!}

                        {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                        {!!Form::textarea('descripcion',$Facultad->descripcion,['class' => 'col-md-6'])!!}

                    </div>
                    {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection