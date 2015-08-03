@extends('Administrador.header')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-12">
            <h1>Contacto</h1>
                <div class="row">
                    <div class="col-md-3 col-xs-5">
                        {!! Html::image('/img/contactos/Oscar.png','Oscar',['class'=>'img-circle']) !!}
                    </div>
                    <div class="col-md-9 col-xs-12">
                        <p> Oscar Muñoz Bernales</p>
                        <p> munoz.bernales.oscar@gmail.com </p>
                        <p> Estudiante de ingenieria en informatica de la UTEM </p>
                        <p> 93290186 </p>
                    </div>
                    <div class="col-md-3 col-xs-5">
                        {!! Html::image('','Jean') !!}
                    </div>
                    <div class="col-md-9 col-xs-12">
                        <p> Estudiante de informaticaasdasdasdads</p>
                    </div>
                    <div class="col-md-3 col-xs-5">
                        {!! Html::image('','Gabo') !!}
                    </div>
                    <div class="col-md-9 col-xs-12">
                        <p> Estudiante de informaticaasdasdasdads</p>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection