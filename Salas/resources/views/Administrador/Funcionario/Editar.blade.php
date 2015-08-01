@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Funcionario
            <a class="glyphicon glyphicon-menu-right"></a>
            Editar
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::model($funcionario,array('route' => array('Admin.Funcionario.update',$funcionario->id), 'method' => 'PUT')) !!}
                    <div class="form-group">

                        {!!Form::label('nombres','Nombres',['class' => 'col-md-6'])!!}
                        {!!Form::text('nombres',$funcionario->nombres,['class' => 'col-md-6'])!!}

                        {!!Form::label('apellidos','Apellidos',['class' => 'col-md-6'])!!}
                        {!!Form::text('apellidos',$funcionario->apellidos,['class' => 'col-md-6'])!!}

                        {!!Form::label('email','E-MAIL',['class' => 'col-md-6'])!!}
                        {!!Form::email('email',$funcionario->email,['class' => 'col-md-6'])!!}

                        {!!Form::label('departamentos','Departamento',['class' => 'col-md-6'])!!}
                        {!!Form::select('departamentos',$depto,$funcionario->departamento->id,['class' => 'col-md-6'])!!}

                    </div>
                    {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection