@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Carrera
            <a class="glyphicon glyphicon-menu-right"></a>
            Editar
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::model($Carrera,array('route' => array('Admin.Carrera.update',$Carrera->id), 'method' => 'PUT')) !!}
                    <div class="form-group">

                        {!!Form::label('nombre','Nombre',['class' => 'col-md-6'])!!}
                        {!!Form::text('nombre',$Carrera->nombre,['class' => 'col-md-6'])!!}

                        {!!Form::label('codigo','Codigo',['class' => 'col-md-6'])!!}
                        {!!Form::number('codigo',$Carrera->codigo,['class' => 'col-md-6'])!!}

                        {!!Form::label('escuela','Escuela',['class' => 'col-md-6'])!!}
                        {!!Form::select('escuela',$Escuela,$Carrera->escuela->id,['class' => 'col-md-6'])!!}

                        {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                        {!!Form::textarea('descripcion',$Carrera->descripcion,['class' => 'col-md-6'])!!}


                    </div>
                    {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection