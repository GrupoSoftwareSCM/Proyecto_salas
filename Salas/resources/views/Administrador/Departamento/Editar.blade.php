@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Departamentos
            <a class="glyphicon glyphicon-menu-right"></a>
            Editar
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::model($Departamento,array('route' => array('Admin.Depto.update',$Departamento->id), 'method' => 'PUT')) !!}
                    <div class="form-group">

                        {!!Form::label('facultad_id','Ingrese Facultad',['class' => 'col-md-6'])!!}
                        {!!Form::select('facultad_id',$Facultad,$Departamento->facultad_id,['class' => 'col-md-6'])!!}

                        {!!Form::label('nombre','Nombre Departamentos',['class' => 'col-md-6'])!!}
                        {!!Form::text('nombre',$Departamento->nombre,['class' => 'col-md-6'])!!}

                        {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                        {!!Form::textarea('descripcion',$Departamento->descripcion,['class' => 'col-md-6'])!!}

                    </div>
                    {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection