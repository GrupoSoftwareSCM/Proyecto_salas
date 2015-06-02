@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<!--<li><a href="{{ url('/') }}">Home</a></li>-->
					<li><a href="#">Ver sala</a></li>
					<li><a href="#">Consultar sala</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
