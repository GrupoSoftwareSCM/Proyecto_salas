@extends('Administrador.homeAdm')

@section('createBody')

    @if($_SERVER['REQUEST_URI'] == "/Admin/Campus/create")
        <div class="panel panel-success">
            <div class="panel-body">
                Campus
            </div>
            <div class="panel-footer">
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

                                {!!Form::label('rut_encargado','Rut Encargado',['class' => 'col-md-6'])!!}
                                {!!Form::text('rut_encargado','',['class' => 'col-md-6'])!!}

                                {!!Form::label('descripcion','Descripcion',['class' => 'col-md-6'])!!}
                                {!!Form::textarea('descripcion','',['class' => 'col-md-6'])!!}

                            </div>
                        {!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>

    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Facultad/create")
        <div class="panel panel-success">
            <div class="panel-body">
                Facultad
            </div>
            <div class="panel-footer">
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
                </div>
            </div>
        </div>
    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Depto/create")
        <div class="panel panel-success">
            <div class="panel-body">
                Departamento
            </div>
            <div class="panel-footer">
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
                </div>
            </div>
        </div>
    @elseif($_SERVER['REQUEST_URI'] == "/Admin/Escuela/create")
        <div class="panel panel-success">
            <div class="panel-body">
                Escuela
            </div>
            <div class="panel-footer">
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
                </div>
            </div>
        </div>
    @endif
@endsection