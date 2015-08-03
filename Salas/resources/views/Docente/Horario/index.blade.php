@extends('Docente.homeDoc')

@section('body')

    <div class="panel panel-success">
        <div class="panel-body">
            Horario
        </div>
        <div class="panel-footer">
            <div class="table-responsive">
                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                    <tr>
                        <th class="center"></th>
                        <th class="center">Lunes</th>
                        <th class="center">Martes</th>
                        <th class="center">Miercoles</th>
                        <th class="center">Jueves</th>
                        <th class="center">Viernes</th>
                    </tr>
                    <tr>
                        {{-- ACA VAMOS HACER UN FORECHAR PARA PODER TENER EL HORARIO DEL PROFE,
                            SE VA MOSTRAR DE LA SIGUIENTE FORMA
                            PERIODO_I-HORAIO_LUNES-HORARIO_MARTES...
                            PERIODO_II-HORAIO_LUNES-HORARIO_MARTES...
                            Y ASI SUSECIVAMENTE--}}
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection