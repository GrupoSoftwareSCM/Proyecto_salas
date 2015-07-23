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
                        {!!Form::open(['route' => 'Admin.Campus.store','method' => 'POST'])!!}
                            <div class="form-group">

                                {!!Form::label('nombre campus','Nombre Campus',['class' => 'col-md-6'])!!}
                                {!!Form::text('nombre','',['class' => 'col-md-6'])!!}

                                {!!Form::label('direccion','Direccion',['class' => 'col-md-6'])!!}
                                {!!Form::text('direccion','',['class' => 'col-md-6'])!!}

                                {!!Form::label('latitud','Latitud',['class' => 'col-md-6'])!!}
                                {!!Form::number('latitud','',['class' => 'col-md-6','step' => '0.001'])!!}

                                {!!Form::label('longitud','Longitud',['class' => 'col-md-6'])!!}
                                {!!Form::number('longitud','',['class' => 'col-md-6','step' => '0.001'])!!}

                                {!!Form::label('rut_encargado','Rut Encargado',['class' => 'col-md-6'])!!}
                                {!!Form::text('rut_encargado','',['class' => 'col-md-6'])!!}

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

                            {!!Form::label('facultad_id','Ingrese Campus',['class' => 'col-md-6'])!!}
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

                            {!!Form::label('departamento_id','Ingrese Campus',['class' => 'col-md-6'])!!}
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
                </div>
            </div>
        </div>

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Roluser/create")
        <div class="panel panel-success">
            <div class="panel-body">
                Roles
                <a class="glyphicon glyphicon-menu-right"></a>
                Asignar
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
                        {!!Form::open(['route' => 'Admin.Roluser.store','method' => 'POST'])!!}
                        <div class="form-group">

                            {!!Form::label('nombres','Nombres',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombres','',['class' => 'col-md-6'])!!}

                            {!!Form::label('apellidos','Apellidos',['class' => 'col-md-6'])!!}
                            {!!Form::text('apellidos','',['class' => 'col-md-6'])!!}

                            {!!Form::label('email','E-mail',['class' => 'col-md-6'])!!}
                            {!!Form::text('email','',['class' => 'col-md-6'])!!}

                            {!!Form::label('rut','R.U.T.',['class' => 'col-md-6'])!!}
                            {!!Form::text('rut','',['class' => 'col-md-6'])!!}

                            {!!Form::label('rol_id','Seleccione rol',['class' => 'col-md-6'])!!}
                            {!!Form::select('rol_id',$rol,'',['class' => 'col-md-6'])!!}

                        </div>
                        {!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}

                    </div>
                </div>
            </div>
        </div>

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Salas/create")
    @endif
@endsection