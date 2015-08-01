@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Escuela
            <a class="glyphicon glyphicon-menu-right"></a>
            Editar
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::model($Escuela,array('route' => array('Admin.Escuela.update',$Escuela->id), 'method' => 'PUT')) !!}
                    <div class="form-group">

                        {!!Form::label('departamento_id','Ingrese Facultad',['class' => 'col-md-6'])!!}
                        {!!Form::select('departamento_id',$Departamento,$Escuela->departamento_id,['class' => 'col-md-6'])!!}

                        {!!Form::label('nombre','Nombre Departamentos',['class' => 'col-md-6'])!!}
                        {!!Form::text('nombre',$Escuela->nombre,['class' => 'col-md-6'])!!}

                        {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                        {!!Form::textarea('descripcion',$Escuela->descripcion,['class' => 'col-md-6'])!!}

                    </div>
                    {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection