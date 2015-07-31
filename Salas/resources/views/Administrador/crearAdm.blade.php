@extends('Administrador.homeAdm')

@section('createBody')

    @if($_SERVER['REQUEST_URI'] == "/Admin/Campus/create")
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

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Facultad/create")
        <div class="panel panel-success">
            <div class="panel-body">
                Facultad
                <a class="glyphicon glyphicon-menu-right"></a>
                crear
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
                @elseif(Session::has('alert'))
                    <div class="alert alert-warning">
                        <strong>OOpps!</strong><br><br>
                        <ul>
                            <li>{{ Session::get('alert') }}</li>
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        {!!Form::open(['route' => 'Admin.Facultad.store','method' => 'POST'])!!}
                        <div class="form-group">

                            {!!Form::label('id_campus','Ingrese Campus',['class' => 'col-md-6'])!!}
                            {!!Form::select('campus_id',$campus,'',['class' => 'col-md-6'])!!}

                            {!!Form::label('nombre','Nombre Facultad',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombre','',['class' => 'col-md-6'])!!}

                            {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                            {!!Form::textarea('descripcion','',['class' => 'col-md-6'])!!}

                        </div>
                        {!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                    <div class="col-md-6">
                        {!!Form::open(['route' => 'files.facultad.up','method' => 'POST','enctype' =>'multipart/form-data'])!!}
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
    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Depto/create")
        <div class="panel panel-success">
            <div class="panel-body">
                Departamento
                <a class="glyphicon glyphicon-menu-right"></a>
                crear
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
                        {!!Form::open(['route' => 'Admin.Depto.store','method' => 'POST'])!!}
                        <div class="form-group">

                            {!!Form::label('facultad_id','Ingrese Facultad',['class' => 'col-md-6'])!!}
                            {!!Form::select('facultad_id',$Facultad,'',['class' => 'col-md-6'])!!}

                            {!!Form::label('nombre','Nombre Departamentos',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombre','',['class' => 'col-md-6'])!!}

                            {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                            {!!Form::textarea('descripcion','',['class' => 'col-md-6'])!!}

                        </div>
                        {!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                    <div class="col-md-6">
                        {!!Form::open(['route' => 'files.departamento.up','method' => 'POST','enctype' =>'multipart/form-data'])!!}
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

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Escuela/create")

        <div class="panel panel-success">
            <div class="panel-body">
                Escuela
                <a class="glyphicon glyphicon-menu-right"></a>
                crear
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
                        {!!Form::open(['route' => 'Admin.Escuela.store','method' => 'POST'])!!}
                        <div class="form-group">

                            {!!Form::label('departamento_id','Ingrese Departamento',['class' => 'col-md-6'])!!}
                            {!!Form::select('departamento_id',$Departamento,'',['class' => 'col-md-6'])!!}

                            {!!Form::label('nombre','Nombre Escuela',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombre','',['class' => 'col-md-6'])!!}

                            {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                            {!!Form::textarea('descripcion','',['class' => 'col-md-6'])!!}

                        </div>
                        {!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                    <div class="col-md-6">
                        {!!Form::open(['route' => 'files.Escuela.up','method' => 'POST','enctype' =>'multipart/form-data'])!!}
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

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/TpoSala/create")
        <div class="panel panel-success">
            <div class="panel-body">
                Tipo sala
                <a class="glyphicon glyphicon-menu-right"></a>
                crear
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
                        {!!Form::open(['route' => 'Admin.TpoSala.store','method' => 'POST'])!!}
                        <div class="form-group">

                            {!!Form::label('nombre','Nombre Tipo de la sala',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombre','',['class' => 'col-md-6'])!!}

                            {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                            {!!Form::textarea('descripcion','',['class' => 'col-md-6'])!!}

                        </div>
                        {!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                    <div class="col-md-6">
                        {!!Form::open(['route' => 'files.Tposala.up','method' => 'POST','enctype' =>'multipart/form-data'])!!}
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

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Salas/create")
        <div class="panel panel-success">
            <div class="panel-body">
                Salas
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
                        {!!Form::open(['route' => 'Admin.Salas.store','method' => 'POST'])!!}
                        <div class="form-group">

                            {!!Form::label('nombre','Nombre Sala',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombre','',['class' => 'col-md-6'])!!}

                            {!!Form::label('capacidad','Capacidad',['class' => 'col-md-6'])!!}
                            {!!Form::number('capacidad','',['class' => 'col-md-6'])!!}

                            {!!Form::label('tipo_sala_id','Seleccione tipo de sala',['class' => 'col-md-6'])!!}
                            {!!Form::select('tipo_sala_id',$Tposala,'',['class' => 'col-md-6'])!!}

                            {!!Form::label('campus_id','Seleccione campus',['class' => 'col-md-6'])!!}
                            {!!Form::select('campus_id',$Campus,'',['class' => 'col-md-6'])!!}

                            {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                            {!!Form::textarea('descripcion','',['class' => 'col-md-6'])!!}

                        </div>
                        {!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}


                    </div>

                    <div class="col-md-6">
                        {!!Form::open(['route' => 'files.Salas.up','method' => 'POST','enctype' =>'multipart/form-data'])!!}
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

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Carrera/create")
        <div class="panel panel-success">
            <div class="panel-body">
                Carrera
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
                @elseif(Session::has('alert'))
                    <div class="alert alert-warning">
                        <strong>OOpps!</strong><br><br>
                        <ul>
                            <li>{{ Session::get('alert') }}</li>
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        {!!Form::open(['route' => 'Admin.Carrera.store','method' => 'POST'])!!}
                        <div class="form-group">

                            {!!Form::label('nombre','Nombre',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombre','',['class' => 'col-md-6'])!!}

                            {!!Form::label('codigo','Codigo',['class' => 'col-md-6'])!!}
                            {!!Form::number('codigo','',['class' => 'col-md-6'])!!}

                            {!!Form::label('escuela','Escuela',['class' => 'col-md-6'])!!}
                            {!!Form::select('escuela',$Escuela,'',['class' => 'col-md-6'])!!}

                            {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                            {!!Form::textarea('descripcion','',['class' => 'col-md-6'])!!}

                        </div>
                        {!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}


                    </div>

                    <div class="col-md-6">
                        {!!Form::open(['route' => 'files.Carrera.up','method' => 'POST','enctype' =>'multipart/form-data'])!!}
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

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Administrador/create")
        <div class="panel panel-success">
            <div class="panel-body">
                Administrador
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
                        {!!Form::open(['route' => 'Admin.Administrador.store','method' => 'POST'])!!}
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

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/EncargadoCampus/create")
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

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Estudiante/create")
        <div class="panel panel-success">
            <div class="panel-body">
                Estudiante
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
                        {!!Form::open(['route' => 'Admin.Estudiante.store','method' => 'POST'])!!}
                        <div class="form-group">

                            {!!Form::label('nombres','Nombres',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombres','',['class' => 'col-md-6'])!!}

                            {!!Form::label('apellidos','Apellidos',['class' => 'col-md-6'])!!}
                            {!!Form::text('apellidos','',['class' => 'col-md-6'])!!}

                            {!!Form::label('rut','RUT',['class' => 'col-md-6'])!!}
                            {!!Form::number('rut','',['class' => 'col-md-6','min'=> '1000000','max'=> '99999999', 'required'=>'required'])!!}

                            {!!Form::label('email','E-MAIL',['class' => 'col-md-6'])!!}
                            {!!Form::email('email','',['class' => 'col-md-6'])!!}

                            {!!Form::label('carrera','Carrera',['class' => 'col-md-6'])!!}
                            {!!Form::select('carrera',$Carreras,'',['class' => 'col-md-6'])!!}

                        </div>
                        {!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}


                    </div>

                    <div class="col-md-6">
                        {!!Form::open(['route' => 'files.Administrador.up','method' => 'POST','enctype' =>'multipart/form-data'])!!}
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

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Docente/create")
        <div class="panel panel-success">
            <div class="panel-body">
                Estudiante
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
                        {!!Form::open(['route' => 'Admin.Docente.store','method' => 'POST'])!!}
                        <div class="form-group">

                            {!!Form::label('nombres','Nombres',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombres','',['class' => 'col-md-6'])!!}

                            {!!Form::label('apellidos','Apellidos',['class' => 'col-md-6'])!!}
                            {!!Form::text('apellidos','',['class' => 'col-md-6'])!!}

                            {!!Form::label('rut','RUT',['class' => 'col-md-6'])!!}
                            {!!Form::number('rut','',['class' => 'col-md-6','min'=> '1000000','max'=> '99999999', 'required'=>'required'])!!}

                            {!!Form::label('email','E-MAIL',['class' => 'col-md-6'])!!}
                            {!!Form::email('email','',['class' => 'col-md-6'])!!}

                            {!!Form::label('departamentos','Departamentos',['class' => 'col-md-6'])!!}
                            {!!Form::select('departamentos',$depto,'',['class' => 'col-md-6'])!!}

                        </div>
                        {!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}


                    </div>

                    <div class="col-md-6">
                        {!!Form::open(['route' => 'files.Administrador.up','method' => 'POST','enctype' =>'multipart/form-data'])!!}
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

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Funcionario/create")
        <div class="panel panel-success">
            <div class="panel-body">
                Funcionario
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
                        {!!Form::open(['route' => 'Admin.Funcionario.store','method' => 'POST'])!!}
                        <div class="form-group">

                            {!!Form::label('nombres','Nombres',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombres','',['class' => 'col-md-6'])!!}

                            {!!Form::label('apellidos','Apellidos',['class' => 'col-md-6'])!!}
                            {!!Form::text('apellidos','',['class' => 'col-md-6'])!!}

                            {!!Form::label('rut','RUT',['class' => 'col-md-6'])!!}
                            {!!Form::number('rut','',['class' => 'col-md-6','min'=> '1000000','max'=> '99999999', 'required'=>'required'])!!}

                            {!!Form::label('email','E-MAIL',['class' => 'col-md-6'])!!}
                            {!!Form::email('email','',['class' => 'col-md-6'])!!}

                            {!!Form::label('departamentos','Departamentos',['class' => 'col-md-6'])!!}
                            {!!Form::select('departamentos',$depto,'',['class' => 'col-md-6'])!!}

                        </div>
                        {!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}


                    </div>

                    <div class="col-md-6">
                        {!!Form::open(['route' => 'files.Administrador.up','method' => 'POST','enctype' =>'multipart/form-data'])!!}
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
    @endif
@endsection