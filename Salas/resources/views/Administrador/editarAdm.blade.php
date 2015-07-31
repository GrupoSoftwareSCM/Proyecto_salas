@extends('Administrador.homeAdm')

@section('editBody')
    @if(strpos($_SERVER['REQUEST_URI'],'/Campus/') !== false)
        <div class="panel panel-success">
            <div class="panel-body">
                Campus
                <a class="glyphicon glyphicon-menu-right"></a>
                Editar
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::model($Campus,array('route' => array('Admin.Campus.update',$Campus->id), 'method' => 'put')) !!}
                        <div class="form-group">

                            {!!Form::label('nombre','Nombre Campus',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombre',$Campus->nombre,['class' => 'col-md-6'])!!}

                            {!!Form::label('direccion','Direccion',['class' => 'col-md-6'])!!}
                            {!!Form::text('direccion',$Campus->direccion,['class' => 'col-md-6'])!!}

                            {!!Form::label('latitud','Latitud',['class' => 'col-md-6'])!!}
                            {!!Form::number('latitud',$Campus->latitud,['class' => 'col-md-6','step' => '0.001'])!!}

                            {!!Form::label('longitud','Longitud',['class' => 'col-md-6'])!!}
                            {!!Form::number('longitud',$Campus->longitud,['class' => 'col-md-6','step' => '0.001'])!!}

                            {!!Form::label('rut_encargado','Rut Encargado',['class' => 'col-md-6'])!!}
                            {!!Form::text('rut_encargado',$Campus->rut_encargado,['class' => 'col-md-6'])!!}

                            {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                            {!!Form::textarea('descripcion',$Campus->descripcion,['class' => 'col-md-6'])!!}

                        </div>
                        {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>

    @elseif(strpos($_SERVER['REQUEST_URI'],'/Facultad/') !== false)

        <div class="panel panel-success">
            <div class="panel-body">
                Facultad
                <a class="glyphicon glyphicon-menu-right"></a>
                Editar
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::model($Facultad,array('route' => array('Admin.Facultad.update',$Facultad->id), 'method' => 'put')) !!}
                        <div class="form-group">

                            {!!Form::label('id_campus','Ingrese Campus',['class' => 'col-md-6'])!!}
                            {!!Form::select('campus_id',$Campus,$Facultad->campus_id,['class' => 'col-md-6'])!!}

                            {!!Form::label('nombre','Nombre Facultad',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombre',$Facultad->nombre,['class' => 'col-md-6'])!!}

                            {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                            {!!Form::textarea('descripcion',$Facultad->descripcion,['class' => 'col-md-6'])!!}

                        </div>
                        {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>

    @elseif(strpos($_SERVER['REQUEST_URI'],'/Depto/') !== false)

        <div class="panel panel-success">
            <div class="panel-body">
                Departamentos
                <a class="glyphicon glyphicon-menu-right"></a>
                Editar
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::model($Departamento,array('route' => array('Admin.Depto.update',$Departamento->id), 'method' => 'PUT')) !!}
                        <div class="form-group">

                            {!!Form::label('facultad_id','Ingrese Facultad',['class' => 'col-md-6'])!!}
                            {!!Form::select('facultad_id',$Facultad,$Departamento->facultad_id,['class' => 'col-md-6'])!!}

                            {!!Form::label('nombre','Nombre Departamentos',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombre',$Departamento->nombre,['class' => 'col-md-6'])!!}

                            {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                            {!!Form::textarea('descripcion',$Departamento->descripcion,['class' => 'col-md-6'])!!}

                        </div>
                        {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>

    @elseif(strpos($_SERVER['REQUEST_URI'],'/Escuela/') !== false)

        <div class="panel panel-success">
            <div class="panel-body">
                Escuela
                <a class="glyphicon glyphicon-menu-right"></a>
                Editar
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::model($Escuela,array('route' => array('Admin.Escuela.update',$Escuela->id), 'method' => 'PUT')) !!}
                        <div class="form-group">

                            {!!Form::label('departamento_id','Ingrese Facultad',['class' => 'col-md-6'])!!}
                            {!!Form::select('departamento_id',$Departamento,$Escuela->departamento_id,['class' => 'col-md-6'])!!}

                            {!!Form::label('nombre','Nombre Departamentos',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombre',$Escuela->nombre,['class' => 'col-md-6'])!!}

                            {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                            {!!Form::textarea('descripcion',$Escuela->descripcion,['class' => 'col-md-6'])!!}

                        </div>
                        {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>

    @elseif(strpos($_SERVER['REQUEST_URI'],'/TpoSala/') !== false)

        <div class="panel panel-success">
            <div class="panel-body">
                Tipo salas
                <a class="glyphicon glyphicon-menu-right"></a>
                Editar
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::model($TpoSalas,array('route' => array('Admin.TpoSala.update',$TpoSalas->id), 'method' => 'PUT')) !!}
                        <div class="form-group">

                            {!!Form::label('nombre','Nombre Campus',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombre',$TpoSalas->nombre,['class' => 'col-md-6'])!!}

                            {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                            {!!Form::textarea('descripcion',$TpoSalas->descripcion,['class' => 'col-md-6'])!!}

                        </div>
                        {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>

    @elseif(strpos($_SERVER['REQUEST_URI'],'/Salas/') !== false)

        <div class="panel panel-success">
            <div class="panel-body">
                Salas
                <a class="glyphicon glyphicon-menu-right"></a>
                Editar
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::model($Salas,array('route' => array('Admin.Salas.update',$Salas->id), 'method' => 'PUT')) !!}
                        <div class="form-group">

                            {!!Form::label('campus_id','Ingrese Campus',['class' => 'col-md-6'])!!}
                            {!!Form::select('campus_id',$Campus,$Salas->campus_id,['class' => 'col-md-6'])!!}

                            {!!Form::label('tipo_sala_id','Ingrese Tipo de sala',['class' => 'col-md-6'])!!}
                            {!!Form::select('tipo_sala_id',$Tposala,$Salas->tipo_sala_id,['class' => 'col-md-6'])!!}

                            {!!Form::label('nombre','Nombre Sala',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombre',$Salas->nombre,['class' => 'col-md-6'])!!}

                            {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                            {!!Form::textarea('descripcion',$Salas->descripcion,['class' => 'col-md-6'])!!}

                        </div>
                        {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    @elseif(strpos($_SERVER['REQUEST_URI'],'/Roluser/') !== false)
        <div class="panel panel-success">
            <div class="panel-body">
                Roles Usuarios
                <a class="glyphicon glyphicon-menu-right"></a>
                Editar
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::model($rol_user,array('route' => array('Admin.Roluser.update',$rol_user->id), 'method' => 'PUT')) !!}
                        <div class="form-group">

                            {!!Form::label('nombres','Rut',['class' => 'col-md-6'])!!}
                            {!!Form::label('nombres',$rol_user->usuario_rut,['class' => 'col-md-6'])!!}

                            {!!Form::label('rol_id','Seleccione rol',['class' => 'col-md-6'])!!}
                            {!!Form::select('rol_id',$rol,$rol_user->rol_id,['class' => 'col-md-6'])!!}

                        </div>
                        {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    @elseif(strpos($_SERVER['REQUEST_URI'],'/User/') !== false)
        <div class="panel panel-success">
            <div class="panel-body">
                Usuario
                <a class="glyphicon glyphicon-menu-right"></a>
                Editar
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::model($user,array('route' => array('Admin.User.update',$user->rut), 'method' => 'PUT')) !!}
                        <div class="form-group">

                            {!!Form::label('nombres','Nombres',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombres',$user->nombres,['class' => 'col-md-6'])!!}

                            {!!Form::label('apellidos','Apellidos',['class' => 'col-md-6'])!!}
                            {!!Form::text('apellidos',$user->apellidos,['class' => 'col-md-6'])!!}

                            {!!Form::label('rut','Rut',['class' => 'col-md-6'])!!}
                            {!!Form::number('rut',$user->rut,['class' => 'col-md-6'])!!}


                        </div>
                        {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    @elseif(strpos($_SERVER['REQUEST_URI'],'/Carrera/') !== false)
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

    @elseif(strpos($_SERVER['REQUEST_URI'],'/Administrador/') !== false)
        <div class="panel panel-success">
            <div class="panel-body">
                Administrador
                <a class="glyphicon glyphicon-menu-right"></a>
                Editar
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::model($users,array('route' => array('Admin.Administrador.update',$users->rut), 'method' => 'PUT')) !!}
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

    @elseif(strpos($_SERVER['REQUEST_URI'],'/EncargadoCampus/') !== false)

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

    @elseif(strpos($_SERVER['REQUEST_URI'],'/Estudiante/') !== false)

        <div class="panel panel-success">
            <div class="panel-body">
                Estudiante
                <a class="glyphicon glyphicon-menu-right"></a>
                Editar
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::model($estudiante,array('route' => array('Admin.Estudiante.update',$estudiante->id), 'method' => 'PUT')) !!}
                        <div class="form-group">

                            {!!Form::label('nombres','Nombres',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombres',$estudiante->nombres,['class' => 'col-md-6'])!!}

                            {!!Form::label('apellidos','Apellidos',['class' => 'col-md-6'])!!}
                            {!!Form::text('apellidos',$estudiante->apellidos,['class' => 'col-md-6'])!!}

                            {!!Form::label('email','E-MAIL',['class' => 'col-md-6'])!!}
                            {!!Form::email('email',$estudiante->email,['class' => 'col-md-6'])!!}

                            {!!Form::label('carrera','Carrera',['class' => 'col-md-6'])!!}
                            {!!Form::select('carrera',$Carreras,$estudiante->carrera->id,['class' => 'col-md-6'])!!}

                        </div>
                        {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>

    @elseif(strpos($_SERVER['REQUEST_URI'],'/Docente/') !== false)

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

    @elseif(strpos($_SERVER['REQUEST_URI'],'/Funcionario/') !== false)

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
    @endif
@endsection