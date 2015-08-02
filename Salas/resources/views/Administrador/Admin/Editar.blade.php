@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            {!! Html::linkRoute('Admin.Administrador.index','Administrador') !!}
            <a class="glyphicon glyphicon-menu-right"></a>
            Editar
        </div>
        <div class="panel-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::model($users,array('route' => array('Admin.Administrador.update',$users->rut), 'method' => 'PUT','class'=>'form-horizontal')) !!}
                        <div class="form-group">

                            {!!Form::label('nombres','Nombres',['class' => 'control-label'])!!}
                            {!!Form::text('nombres',$users->nombres,['class' => 'form-control'])!!}

                            {!!Form::label('apellidos','Apellidos',['class' => 'control-label'])!!}
                            {!!Form::text('apellidos',$users->apellidos,['class' => 'form-control'])!!}

                            {!!Form::label('email','E-MAIL',['class' => 'control-label'])!!}
                            {!!Form::email('email',$users->email,['class' => 'form-control'])!!}

                        </div>
                        {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection