@extends('Administrador.homeAdm')

@section('editBody')
    @if(strpos($_SERVER['REQUEST_URI'],'/Campus/') !== false)
        <div class="panel panel-success">
            <div class="panel-body">
                Editando Campus
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::model($Campus,array('route' => array('Admin.Campus.update',$Campus->id_campus), 'method' => 'put')) !!}
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
                Editando Facultad
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::model($Facultad,array('route' => array('Admin.Facultad.update',$Facultad->id_facultades), 'method' => 'put')) !!}
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
                Editando Departamentos
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::model($Departamento,array('route' => array('Admin.Depto.update',$Departamento->id_departamentos), 'method' => 'PUT')) !!}
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

    @endif
@endsection