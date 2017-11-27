@extends('layouts.dashboard')
@section('content')
@include('alertas.request')

	<div class="contenido">
		<ol class="breadcrumb">
			<li><a href="/dashboard">Home</a></li>
			<li><a href="/misProyectos">Mis Proyectos</a></li>
			<li class="active">Crear Proyecto</li>
		</ol>
		<div id="resp-terminos"></div>
		<div class="formulario container col-sm-7 col-sm-offset-3 col-md-7 col-md-offset-3">
	    	<form action="{{url('proyectos')}}" method="POST" id="cotizaciones">
				{{ csrf_field() }}

	       		<fieldset>
		        	@include('proyectos.partials.form')
		     		<div class="form-group">
		     			<input type="submit" value="guardar" class="btn btn-block btn-success" id="enviar">
					</div>
				</fieldset>
	    	</form>
	    </div>
	</div>

@endsection


@section('js')
	<script type="text/javascript">
		$('#enviar').on('click', function(event){
		    var tipo = "cedula";
		    if($("#terminos").is(':checked')) {

		        } else {
		        	event.preventDefault();
		            $('#resp-terminos').html('<div class="alert alert-danger text-center">debe leer y aceptar Terminos y Condiciones</div>');
		        }
		});
	</script>
@endsection

