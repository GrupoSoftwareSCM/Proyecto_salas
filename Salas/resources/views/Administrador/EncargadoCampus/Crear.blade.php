@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Encargado Campus
            <a class="glyphicon glyphicon-menu-right"></a>
            Crear
        </div>
        <div class="panel-footer">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>OOoops!</strong> Hubo algunos problemas con su entrada.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    {!!Form::open(['route' => 'Admin.EncargadoCampus.store','method' => 'POST'])!!}
                    <div class="form-group">

                        {!!Form::label('nombres','Nombres',['class' => 'col-md-6'])!!}
                        {!!Form::text('nombres','',['class' => 'col-md-6'])!!}

                        {!!Form::label('apellidos','Apellidos',['class' => 'col-md-6'])!!}
                        {!!Form::text('apellidos','',['class' => 'col-md-6'])!!}

                        {!!Form::label('rut','RUT',['class' => 'col-md-6'])!!}
                        {!!Form::number('rut','',['class' => 'col-md-6','min'=> '1000000','max'=> '99999999', 'required'=>'required'])!!}

                        {!!Form::label('email','E-MAIL',['class' => 'col-md-6'])!!}
                        {!!Form::email('email','',['class' => 'col-md-6'])!!}

                    </div>
                    {!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                    {!!Form::close()!!}


                </div>

                <div class="col-md-6">
                    {!!Form::open(['route' => 'files.Administrador.up','method' => 'POST','enctype' =>'multipart/form-data'])!!}
                    <div class="form-group">
                        {!!Form::label('file','Adjuntar archivo',['class' => 'col-md-6','required'=>'required'])!!}
                        <br/>
                        <input type="file" name="file">

                    </div>
                    {!!Form::button('Enviar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection