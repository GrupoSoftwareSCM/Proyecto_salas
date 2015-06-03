@extends('Administrador.header')

@section('content')
<div class="col-md-8 col-md-offset-2"> 
	<?php if($_SERVER['REQUEST_URI'] == "/adm") {?>
		<div class="panel panel-default">
			<div class="panel-body">
			Bienvenido admnistrador, en esta pagina usted podra ..............................
			</div>
		</div>
	<?php } ?>
	<?php if($_SERVER['REQUEST_URI'] == "/adm/crear") {?>
		<div class="panel panel-default">
			<div class="panel-body">
			estamos en crear 
			</div>
		</div>
	<?php } ?>
	<?php if($_SERVER['REQUEST_URI'] == "/adm/modif") {?>
		<div class="panel panel-default">
			<div class="panel-body"> 
			</div>
		</div>
	<?php } ?>
	<?php if($_SERVER['REQUEST_URI'] == "/adm/archivar") {?>
		<div class="panel panel-default">
			<div class="panel-body">
			</div>
		</div>
	<?php } ?>
</div>

@stop