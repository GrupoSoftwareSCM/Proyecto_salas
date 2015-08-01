@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Docente
            <a class="glyphicon glyphicon-menu-right"></a>
            Editar
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::model($docente,array('route' => array('Admin.Docente.update',$docente->id), 'method' => 'PUT')) !!}
                    <div class="form-group">

                        {!!Form::label('nombres','Nombres',['class' => 'col-md-6'])!!}
                        {!!Form::text('nombres',$docente->nombres,['class' => 'col-md-6'])!!}

                        {!!Form::label('apellidos','Apellidos',['class' => 'col-md-6'])!!}
                        {!!Form::text('apellidos',$docente->apellidos,['class' => 'col-md-6'])!!}

                        {!!Form::label('email','E-MAIL',['class' => 'col-md-6'])!!}
                        {!!Form::email('email',$docente->email,['class' => 'col-md-6'])!!}

                        {!!Form::label('departamentos','Departamento',['class' => 'col-md-6'])!!}
                        {!!Form::select('departamentos',$depto,$docente->departamento->id,['class' => 'col-md-6'])!!}

                    </div>
                    {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection