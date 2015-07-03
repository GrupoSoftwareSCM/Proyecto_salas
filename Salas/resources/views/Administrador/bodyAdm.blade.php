@extends('Administrador.homeAdm')

@section('body')
    @if($_SERVER['REQUEST_URI'] == "/Admin/Campus")

        <div class="panel panel-success">
            <div class="panel-body">
                Campus
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">



                                <nav class="navbar navbar-right">
                                        <a class="btn glyphicon glyphicon-plus" href="/Admin/Campus/create" role="button" aria-label="Left Align">
                                            crear campus
                                        </a>
                                </nav>

                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="center">Nombre</th>
                                        <th class="center">Direccion</th>
                                        <th class="center">Editar</th>
                                        <th class="center">Eliminar</th>

                                    </tr>

                                    </thead>
                                    <tbody>

                                        @foreach($campus as $camp)
                                            <tr>
                                                <th class="center">{{$camp->nombre}}</th>
                                                <th class="center">{{$camp->direccion}}</th>
                                                <th class="center">
                                                    <a class="btn glyphicon glyphicon-pencil" href="Campus/{{$camp->id_campus}}/edit" role="button" aria-label="Left Align"></a>
                                                </th>
                                                <th class="center">
                                                    {!!Form::open(array('route' => array('Admin.Campus.destroy',$camp->id_campus), 'method' => 'DELETE'))!!}

                                                        <button class="glyphicon glyphicon-remove" type="submit">
                                                        </button>

                                                    {!!Form::close()!!}
                                                </th>
                                            </tr>
                                        @endforeach



                                    </tbody>
                                </table>


                    </div>
                </div>
            </div>
        </div>

    @endif
@endsection