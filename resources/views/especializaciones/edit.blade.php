@extends('layouts.dashboard')
@section('content')
@include('alertas.request')

	<div class="contenido">
		<ol class="breadcrumb">
			<li><a href="/dashboard">Home</a></li>
			<li><a href="/misEspecializaciones">Especialidades</a></li>
			<li class="active">Editar {{ $datos->especializacion }}/{{ $datos->actividad }}</li>
		</ol>

		<div class="formulario container col-sm-7 col-sm-offset-3 col-md-7 col-md-offset-3">
	    	{{-- {!! Form::open(['route' => ['misEspecializaciones.update', $datos->id], 'method' => 'PUT', 'id' => 'cotizaciones']) !!} --}}
	    	<form method="POST" action="{{url('especializaciones',$datos->id)}}" id="cotizaciones">
				{{ csrf_field() }}
				{!! method_field('PUT') !!}

	       		<fieldset>
		        	@include('especializaciones.partials.formEdit')
		     		<div class="form-group">
		     			<input type="submit" value="Guardar" class="btn btn-primary">
					</div>
				</fieldset>
	    	{{-- {!! Form::close() !!} --}}
	    	</form>
	    </div>
	</div>

@endsection
