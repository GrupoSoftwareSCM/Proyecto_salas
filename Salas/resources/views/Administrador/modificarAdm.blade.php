@extends('Administrador.homeAdm')

@section('modificar')

<!--	MODIFICAR PERFILES DE USUARIOS	-->
@if($_SERVER['REQUEST_URI'] == "/adm/modif/perfuser")
    <div class="panel panel-success">
        <div class="panel-body">
        </div>
    </div>
@endif


<!--	MODIFICAR CAMPUS	-->
@if($_SERVER['REQUEST_URI'] == "/adm/modif/camp" || $_SERVER['REQUEST_URI'] == "/adm/modif/camps")
    <div class="panel panel-success">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info">
                                <strong>Informacion!</strong> <br/>
                                Seleccione el campus en el cual usted quira realizar modificaciones<br/>
                            </div>
                        </div>
                    </div> <!-- PARA LE MENSAJE PRINCIPAL, INFORMACION -->
                    {!!Form::open(['url' => 'adm/modif/camp'])!!}
                        <div class="row">
                            <div class="col-md-12">
                                @if($campus_select == null)
                                    {!!Form::label('id_campus','Seleccione Campus',['class' => 'col-md-3'])!!}
                                    {!!Form::select('id_campus',$Campus,'',['class' => 'col-md-3'])!!}
                                @else
                                    {!!Form::label('id_campus','Seleccione Campus',['class' => 'col-md-3'])!!}
                                    {!!Form::select('id_campus',$Campus,$campus_select,['class' => 'col-md-3'])!!}
                                @endif

                                {!!Form::button('Generar',['class' => 'btn btn-danger col-md-3 col-md-offset-1','type' => 'submit'])!!}

                            </div>
                        </div>
                    {!!Form::close()!!}

                    @if($datos_campus != null)
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    <strong>Informacion!</strong> <br/>
                                    Ahora usted puede modificar el campus elegido<br/>
                                </div>
                            </div>
                        </div> <!-- PARA LE MENSAJE PRINCIPAL, INFORMACION -->
                        {!!Form::open(['url' => 'adm/modif/camps'])!!}

                            {!!Form::label('Nombre_campus','Nombre Campus',['class' => 'col-md-3 col-md-offset-2'])!!}
                            {!!Form::text('Nombre_campus','',['class' => 'col-md-5', 'placeholder' => $datos_campus['nombre']])!!}
                            <br>

                            {!!Form::label('Rut_Encargado','Rut Encargado',['class' => 'col-md-3 col-md-offset-2'])!!}
                            {!!Form::text('Rut_Encargado','',['class' => 'col-md-5','placeholder' => $datos_campus['rut_encargado']])!!}
                            <br>

                            {!!Form::label('direccion','Dirección',['class' => 'col-md-3 col-md-offset-2'])!!}
                            {!!Form::text('Direccion','',['class' => 'col-md-5','placeholder' => $datos_campus['direccion']])!!}
                            <br>

                            {!!Form::label('latitud','Latitud',['class' => 'col-md-3 col-md-offset-2'])!!}
                            {!!Form::number('latitud','',['class' => 'col-md-5','step' => '0.001','placeholder' => $datos_campus['latitud']])!!}
                            <br>

                            {!!Form::label('longitud','Longitud',['class' => 'col-md-3 col-md-offset-2'])!!}
                            {!!Form::number('longitud','',['class' => 'col-md-5','step' => '0.001','placeholder' => $datos_campus['longitud']])!!}
                            <br>


                            {!!Form::label('descripcion_campus','Descripcion',['class' => 'col-md-3 col-md-offset-2'])!!}
                            {!!Form::textarea('Descripcion_campus','',['class' => 'col-md-5','placeholder' => $datos_campus['descripcion']])!!}

                            <br>
                            {!!Form::button('Actualizar',['class' => 'btn btn-danger col-md-3 col-md-offset-4','type' => 'submit'])!!}

                            {!!Form::hidden('id_campus',$datos_campus['id_campus'])!!}
                        {!!Form::close()!!}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif

<!--	MODIFICAR FACULTAD	-->
@if($_SERVER['REQUEST_URI'] == "/adm/modif/Facultad")
    <div class="panel panel-success">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info">
                                <strong>Informacion!</strong> <br/>
                                Seleccione la facultad en el cual usted quira realizar modificaciones<br/>
                            </div>
                        </div>
                    </div> <!-- PARA LE MENSAJE PRINCIPAL, INFORMACION -->
                    {!!Form::open(['url' => 'adm/modif/Facultad'])!!}
                    <div class="row">
                        <div class="col-md-12">
                            @if($facultad_select == null)
                                {!!Form::label('id_facultad','Seleccione Facultad',['class' => 'col-md-3'])!!}
                                {!!Form::select('id_faculad',$Facultad,'',['class' => 'col-md-3'])!!}
                            @else
                                {!!Form::label('id_facultad','Seleccione Facultad',['class' => 'col-md-3'])!!}
                                {!!Form::select('id_faculad',$Facultad,$facultad_select,['class' => 'col-md-3'])!!}
                            @endif

                            {!!Form::button('Generar',['class' => 'btn btn-danger col-md-3 col-md-offset-1','type' => 'submit'])!!}

                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endif

<!--	MODIFICAR DEPARTAMENTO	-->
@if($_SERVER['REQUEST_URI'] == "/adm/modif/Depto")
    <div class="panel panel-success">
        <div class="panel-body">
        </div>
    </div>
@endif

<!--	MODIFICAR ESCUELA	-->
@if($_SERVER['REQUEST_URI'] == "/adm/modif/Escuela")
    <div class="panel panel-success">
        <div class="panel-body">
        </div>
    </div>
@endif

<!--	MODIFICAR ENCARGADO CAMPUS	-->
@if($_SERVER['REQUEST_URI'] == "/adm/modif/encamp")
    <div class="panel panel-success">
        <div class="panel-body">
        </div>
    </div>
@endif
@endsection