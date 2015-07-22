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
                Roles
                <a class="glyphicon glyphicon-menu-right"></a>
                Editar
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::model($roles_usuario,array('route' => array('Admin.Roluser.update',$roles_usuario->id), 'method' => 'PUT')) !!}
                        <div class="form-group">

                            {!!Form::label('nombres','Nombres',['class' => 'col-md-6'])!!}
                            {!!Form::text('nombres',$usuario->nombres,['class' => 'col-md-6'])!!}

                            {!!Form::label('apellidos','Apellidos',['class' => 'col-md-6'])!!}
                            {!!Form::text('apellidos',$usuario->apellidos,['class' => 'col-md-6'])!!}

                            {!!Form::label('email','E-mail',['class' => 'col-md-6'])!!}
                            {!!Form::text('email',$usuario->email,['class' => 'col-md-6'])!!}

                            {!!Form::label('rut','R.U.T.',['class' => 'col-md-6'])!!}
                            {!!Form::text('rut',$usuario->rut,['class' => 'col-md-6'])!!}

                            {!!Form::label('rol_id','Seleccione rol',['class' => 'col-md-6'])!!}
                            {!!Form::select('rol_id',$rol,$rol_id->id,['class' => 'col-md-6'])!!}


                        </div>
                        {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection