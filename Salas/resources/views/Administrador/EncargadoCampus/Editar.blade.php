@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Encardo Campus
            <a class="glyphicon glyphicon-menu-right"></a>
            Editar
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::model($users,array('route' => array('Admin.EncargadoCampus.update',$users->rut), 'method' => 'PUT')) !!}
                    <div class="form-group">

                        {!!Form::label('nombres','Nombres',['class' => 'col-md-6'])!!}
                        {!!Form::text('nombres',$users->nombres,['class' => 'col-md-6'])!!}

                        {!!Form::label('apellidos','Apellidos',['class' => 'col-md-6'])!!}
                        {!!Form::text('apellidos',$users->apellidos,['class' => 'col-md-6'])!!}

                        {!!Form::label('email','E-MAIL',['class' => 'col-md-6'])!!}
                        {!!Form::email('email',$users->email,['class' => 'col-md-6'])!!}

                    </div>
                    {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection