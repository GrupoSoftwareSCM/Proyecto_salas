@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Campus
            <a class="glyphicon glyphicon-menu-right"></a>
            crear
        </div>
        <div class="panel-footer">
            <div class="errors">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>OOoops!</strong> Hubo algunos problemas con su entrada.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul></div>
                @elseif(Session::has('alert'))
                    <div class="alert alert-warning">
                        <strong>OOpps!</strong><br><br>
                        <ul>
                            <li>{{ Session::get('alert') }}</li>
                        </ul>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-6">
                    {!!Form::open(['route' => 'Admin.Campus.store','method' => 'POST'])!!}
                    <div class="form-group">

                        {!!Form::label('nombre','Nombre Campus',['class' => 'col-md-6'])!!}
                        {!!Form::text('nombre','',['class' => 'col-md-6'])!!}

                        {!!Form::label('direccion','Direccion',['class' => 'col-md-6'])!!}
                        {!!Form::text('direccion','',['class' => 'col-md-6'])!!}

                        {!!Form::label('latitud','Latitud',['class' => 'col-md-6'])!!}
                        {!!Form::number('latitud','',['class' => 'col-md-6','step' => '0.001'])!!}

                        {!!Form::label('longitud','Longitud',['class' => 'col-md-6'])!!}
                        {!!Form::number('longitud','',['class' => 'col-md-6','step' => '0.001'])!!}

                        {!!Form::label('encargado','Encargado',['class' => 'col-md-6'])!!}
                        {!!Form::select('encargado',$Encargado,'',['class' => 'col-md-6'])!!}

                        {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                        {!!Form::textarea('descripcion','',['class' => 'col-md-6'])!!}

                    </div>
                    {!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                    {!!Form::close()!!}
                </div>
                <div class="col-md-6">
                    {!!Form::open(['route' => 'files.campus.Up','method' => 'POST','enctype' =>'multipart/form-data'])!!}
                    <div class="form-group">
                        {!!Form::label('file','Adjuntar archivo',['class' => 'col-md-6'])!!}
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