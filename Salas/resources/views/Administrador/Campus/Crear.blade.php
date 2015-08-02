@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            {!! Html::linkRoute('Admin.Campus.index','Campus') !!}
            <a class="glyphicon glyphicon-menu-right"></a>
            crear
        </div>
        <div class="panel-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
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
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        {!!Form::open(['route' => 'Admin.Campus.store','method' => 'POST', 'class'=>'form-vertical'])!!}
                        <div class="form-group">

                            {!!Form::label('nombre','Nombre Campus',['class' => 'control-label'])!!}
                            {!!Form::text('nombre','',['class' => 'form-control'])!!}

                            {!!Form::label('direccion','Direccion',['class' => 'control-label'])!!}
                            {!!Form::text('direccion','',['class' => 'form-control'])!!}

                            {!!Form::label('latitud','Latitud',['class' => 'control-label'])!!}
                            {!!Form::number('latitud','',['class' => 'form-control','step' => '0.001'])!!}

                            {!!Form::label('longitud','Longitud',['class' => 'control-label'])!!}
                            {!!Form::number('longitud','',['class' => 'form-control','step' => '0.001'])!!}

                            {!!Form::label('encargado','Encargado',['class' => 'control-label'])!!}
                            {!!Form::select('encargado',$Encargado,'',['class' => 'form-control'])!!}

                            {!!Form::label('descripcion','Descripcion',['class' => 'control-label'])!!}
                            {!!Form::textarea('descripcion','',['class' => 'form-control'])!!}

                        </div>
                        {!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                    <div class="col-md-6">
                        {!!Form::open(['route' => 'files.campus.Up','method' => 'POST','enctype' =>'multipart/form-data', 'class'=>'form-vertical'])!!}
                        <div class="form-group">
                            {!!Form::label('file','Adjuntar archivo',['class' => 'control-label'])!!}
                            <input type="file" name="file" class="form-control">

                        </div>
                        {!!Form::button('Enviar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection