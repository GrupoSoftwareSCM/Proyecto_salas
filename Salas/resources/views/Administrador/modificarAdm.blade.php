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
                @if($mensaje != null)
                    <div class="row">
                        <div class="alert alert-success fade in col-md-8 col-md-offset-2">
                            <a class= "close" href="#" data-dismiss="alert">x</a>
                            <strong>Felicidades </strong>
                            {{$mensaje}}
                        </div>
                    </div>
                @endif
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
@if($_SERVER['REQUEST_URI'] == "/adm/modif/Facultad" || $_SERVER['REQUEST_URI'] == "/adm/modif/Facultads")
    <div class="panel panel-success">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    @if($mensaje != null)
                        <div class="row">
                            <div class="alert alert-success fade in col-md-8 col-md-offset-2">
                                <a class= "close" href="#" data-dismiss="alert">x</a>
                                <strong>Felicidades </strong>
                                {{$mensaje}}
                            </div>
                        </div>
                    @endif
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
                                {!!Form::select('id_facultad',$Facultad,'',['class' => 'col-md-3'])!!}
                            @else
                                {!!Form::label('id_facultad','Seleccione Facultad',['class' => 'col-md-3'])!!}
                                {!!Form::select('id_facultad',$Facultad,$facultad_select,['class' => 'col-md-3'])!!}
                            @endif

                            {!!Form::button('Generar',['class' => 'btn btn-danger col-md-3 col-md-offset-1','type' => 'submit'])!!}

                        </div>
                    </div>
                    {!!Form::close()!!}
                    @if($datos_facultad != null)
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    <strong>Informacion!</strong> <br/>
                                    Ahora usted puede modificar la facultad <b>{{$datos_facultad['nombre']}}</b> del campus <b>{{$nombre_campus}}</b> elegida<br/>
                                </div>
                            </div>
                        </div> <!-- PARA LE MENSAJE PRINCIPAL, INFORMACION -->
                        <div class="row">
                            <div class="col-md-12">
                                {!!Form::open(['url' => 'adm/modif/Facultads'])!!}

                                    {!!Form::label('Nombre_facultad','Nombre Facultad',['class' => 'col-md-3'])!!}
                                    {!!Form::text('Nombre_facultad','',['class' => 'col-md-3','placeholder' => $datos_facultad['nombre']])!!}

                                    {!!Form::label('descripcion_facultad','Descripcion',['class' => 'col-md-3'])!!}
                                    {!!Form::textarea('Descripcion_facultad','',['class' => 'col-md-3','rows' => '3','placeholder' => $datos_facultad['descripcion']])!!}

                                    {!!Form::button('Actualizar',['class' => 'btn btn-danger col-md-3 col-md-offset-4','type' => 'submit'])!!}
                                    {!!Form::hidden('id_facultad',$datos_facultad['id_facultades'])!!}

                                {!!Form::close()!!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif

<!--	MODIFICAR DEPARTAMENTO	-->
@if($_SERVER['REQUEST_URI'] == "/adm/modif/Depto" || $_SERVER['REQUEST_URI'] == "/adm/modif/Deptos")
    <div class="panel panel-success">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    @if($mensaje != null)
                        <div class="row">
                            <div class="alert alert-success fade in col-md-8 col-md-offset-2">
                                <a class= "close" href="#" data-dismiss="alert">x</a>
                                <strong>Felicidades </strong>
                                {{$mensaje}}
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info">
                                <strong>Informacion!</strong> <br/>
                                Seleccione el Departamento en el cual usted quira realizar modificaciones<br/>
                            </div>
                        </div>
                    </div> <!-- PARA LE MENSAJE PRINCIPAL, INFORMACION -->
                    {!!Form::open(['url' => 'adm/modif/Depto'])!!}
                    <div class="row">
                        <div class="col-md-12">
                            @if($depto_select == null)
                                {!!Form::label('id_facultad','Seleccione Departamento',['class' => 'col-md-3'])!!}
                                {!!Form::select('id_Depto',$Depto,'',['class' => 'col-md-3'])!!}
                            @else
                                {!!Form::label('id_facultad','Seleccione Departamento',['class' => 'col-md-3'])!!}
                                {!!Form::select('id_Depto',$Depto,$depto_select,['class' => 'col-md-3'])!!}
                            @endif

                            {!!Form::button('Generar',['class' => 'btn btn-danger col-md-3 col-md-offset-1','type' => 'submit'])!!}

                        </div>
                    </div>
                    {!!Form::close()!!}
                    @if($datos_depto != null)
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    <strong>Informacion!</strong> <br/>
                                    Ahora usted puede modificar el Departamento <b>{{$datos_depto['nombre']}}</b> de la facultad <b>{{$nombre_facultad}}</b><br/>
                                </div>
                            </div>
                        </div> <!-- PARA LE MENSAJE PRINCIPAL, INFORMACION -->
                        <div class="row">
                            <div class="col-md-12">
                                {!!Form::open(['url' => 'adm/modif/Deptos'])!!}

                                {!!Form::label('Nombre_depto','Nombre Departamento',['class' => 'col-md-3'])!!}
                                {!!Form::text('Nombre_depto','',['class' => 'col-md-3','placeholder' => $datos_depto['nombre']])!!}

                                {!!Form::label('descripcion_depto','Descripcion',['class' => 'col-md-3'])!!}
                                {!!Form::textarea('Descripcion_depto','',['class' => 'col-md-3','rows' => '3','placeholder' => $datos_depto['descripcion']])!!}

                                {!!Form::button('Actualizar',['class' => 'btn btn-danger col-md-3 col-md-offset-4','type' => 'submit'])!!}
                                {!!Form::hidden('id_Depto',$datos_depto['id_departamentos'])!!}

                                {!!Form::close()!!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif

<!--	MODIFICAR ESCUELA	-->
@if($_SERVER['REQUEST_URI'] == "/adm/modif/Escuela" || $_SERVER['REQUEST_URI'] == "/adm/modif/Escuelas")
    <div class="panel panel-success">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    @if($mensaje != null)
                        <div class="row">
                            <div class="alert alert-success fade in col-md-8 col-md-offset-2">
                                <a class= "close" href="#" data-dismiss="alert">x</a>
                                <strong>Felicidades </strong>
                                {{$mensaje}}
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info">
                                <strong>Informacion!</strong> <br/>
                                Seleccione la Escuela en el cual usted quira realizar modificaciones<br/>
                            </div>
                        </div>
                    </div> <!-- PARA LE MENSAJE PRINCIPAL, INFORMACION -->

                    {!!Form::open(['url' => 'adm/modif/Escuela'])!!}
                        <div class="row">
                            <div class="col-md-12">
                                @if($escuela_select == null)
                                    {!!Form::label('id_escuela','Seleccione Escuela',['class' => 'col-md-3'])!!}
                                    {!!Form::select('id_escuela',$escuela,'',['class' => 'col-md-3'])!!}
                                @else
                                    {!!Form::label('id_escuela','Seleccione Escuela',['class' => 'col-md-3'])!!}
                                    {!!Form::select('id_escuela',$escuela,$escuela_select,['class' => 'col-md-3'])!!}
                                @endif

                                {!!Form::button('Generar',['class' => 'btn btn-danger col-md-3 col-md-offset-1','type' => 'submit'])!!}

                            </div>
                        </div>
                    {!!Form::close()!!}

                        @if($datos_escuela != null)
                            <br/>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-info">
                                        <strong>Informacion!</strong> <br/>
                                        Ahora usted puede modificar la Escuela de <b>{{$datos_escuela['nombre']}}</b> del Departamento de <b>{{$nombre_depto}}</b><br/>
                                    </div>
                                </div>
                            </div> <!-- PARA LE MENSAJE PRINCIPAL, INFORMACION -->
                            <div class="row">
                                <div class="col-md-12">
                                    {!!Form::open(['url' => 'adm/modif/Escuelas'])!!}

                                        {!!Form::label('Nombre_escuela','Nombre Escuela',['class' => 'col-md-3'])!!}
                                        {!!Form::text('Nombre_escuela','',['class' => 'col-md-3','placeholder' => $datos_escuela['nombre']])!!}

                                        {!!Form::label('descripcion_escuela','Descripcion',['class' => 'col-md-3'])!!}
                                        {!!Form::textarea('Descripcion_escuela','',['class' => 'col-md-3','rows' => '3','placeholder' => $datos_escuela['descripcion']])!!}

                                        {!!Form::button('Actualizar',['class' => 'btn btn-danger col-md-3 col-md-offset-4','type' => 'submit'])!!}
                                        {!!Form::hidden('id_escuela',$datos_escuela['id_escuelas'])!!}

                                    {!!Form::close()!!}
                                </div>
                            </div>
                        @endif
                </div>
            </div>
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