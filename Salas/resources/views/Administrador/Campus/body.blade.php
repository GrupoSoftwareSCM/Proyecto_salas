@extends('Administrador.homeAdm')

@section('body')
        <div class="panel panel-success">
            <div class="panel-body">
                Campus
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mensaje">
                            @if(Session::has('message'))
                                <div class="alert alert-info">
                                    <strong>Execelente!</strong><br><br>
                                    <ul>
                                        <li>{{ Session::get('message') }}</li>
                                    </ul>
                                </div>
                            @elseif(Session::has('destroy'))
                                <div class="alert alert-danger">
                                    <strong>Tus deseos son ordenes!</strong><br><br>
                                    <ul>
                                        <li>{{ Session::get('destroy') }}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-8">
                                <nav class="navbar navbar-right">
                                    <a class="btn glyphicon glyphicon-plus" href="/Admin/Campus/create" role="button" aria-label="Left Align">Crear Campus</a>
                                </nav>
                            </div>
                        </div>
                        {!!Form::open(['route'=>'Admin.Campus.index','method'=>'GET','class'=>'navbar-form navbar-right pull-right'])!!}
                            {!!Form::text('nombre_campus',null,['class'=>'form-control','placeholder'=>'Nombre del Campus'])!!}
                            {!!Form::button('Buscar',['class' => 'btn btn-default','type' => 'submit'])!!}
                        {!!Form::close()!!}
                        {!!Html::linkRoute('Admin.Campus.index','Mostrar todo',null,['class'=>'btn btn-default','role'=>'button'])!!}

                        @if(count($campus)>0)
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">Nombre</th>
                                    <th class="center">Direccion</th>
                                    <th class="center">Editar</th>
                                    <th class="center">Eliminar</th>
                                    <th class="center">Descargar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($campus as $camp)
                                    <tr>
                                        <th class="center">{{$camp->nombre}}</th>
                                        <th class="center">{{$camp->direccion}}</th>
                                        <th class="center">
                                            <a class="btn glyphicon glyphicon-pencil" href="Campus/{{$camp->id}}/edit" role="button" aria-label="Left Align"></a>
                                        </th>
                                        <th class="center">
                                            {!!Form::open(array('route' => array('Admin.Campus.destroy',$camp->id), 'method' => 'DELETE'))!!}

                                            <button class="glyphicon glyphicon-remove" type="submit">
                                            </button>

                                            {!!Form::close()!!}
                                        </th>
                                        <th class="center">
                                            {!!Html::link('files/campus/'.$camp->id,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                        </th>
                                    </tr>
                                @endforeach
                                {!! $campus->render() !!}
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-9">
                                    <nav class="navbar navbar-right">
                                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th class="center">Descargar Campus</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th class="center">
                                                    {!!Html::link('files/campusall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                                </th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </nav>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-8 col-md-offset-4">
                                    <div class="alert alert-info">
                                        <strong>Execelente!</strong><br><br>
                                        <ul>
                                            <li>No hay Campus registrados</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
@endsection