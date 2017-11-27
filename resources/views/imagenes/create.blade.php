@extends('layouts.dashboard')
@section('content')
<div class="container">
	<div class="row">
				<ol class="breadcrumb">
				  <li><a href="/dashboard">Home</a></li>
				   <li><a href="/misProyectos">Mis Proyectos</a></li>
				   <li><a href="/misProyectos/{{ $id }}">Ver Proyecto</a></li>
				  <li class="active">Subir Imagenes al proyecto</li>
				</ol>

		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel-primary panel">
				<div class="panel-heading">
					<h3 class="text-center">Cuadro para Subir imagenes</h3>
				</div>

				<form method="POST" action="{{url('subirimagenes')}}" accept-charset="UTF-8" class="dropzone dz-clickable" id="my-dropzone" enctype="multipart/form-data">
   				 {{ csrf_field() }}
				<input type="hidden" name="proyecto" value="{{ $id }}">
				</form>
			</div>
		</div>

	</div>


</div>
@stop

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('dropzone/dist/dropzone.css')}}">
	@stop
	@section('js')
	<script type="text/javascript" src="{{asset('dropzone/dist/dropzone.js')}}"></script>
	<script>
		Dropzone.options.myDropzone = {
            autoProcessQueue: true,
            uploadMultiple: true,
            maxFilezise: 10,
            maxFiles: 2,

        };

    </script>
	@stop