@extends('layouts.dashboard')
	@section('content')
	<div class="contenido">
				<ol class="breadcrumb">
				  <li><a href="/dashboard">Home</a></li>
				   <li><a href="/misProyectos">Mis Proyectos</a></li>
				  <li class="active">Ver Proyecto</li>
				</ol>
				<section class="container proyectos">
					<h2 class="text-center">Proyectos y Galeria <a href="{{ url('/proyectos/'.$datos->id.'/edit')}}" class="btn btn-success">Editar proyecto</a></h2>

					<!-- Page Content -->
				    <div class="container">

				      <!-- Portfolio Item Heading -->
				      <h3 >Proyecto
				        <small id="titulos">{{ $datos->nombre }} </small>
				      </h3>

				      <!-- Portfolio Item Row -->
				      <div class="row">

				        <div class="col-xs-12 col-sm-7 col-md-8 col-lg-8 card-proyecto" >
				        	<a href="" class="img-card-grande">
				          		<img class="img-thumbnail img-responsive" src="{{ asset('uploads/'.$foto) }}" alt="imagen" width="100">
				         	</a>
				        </div>

				        <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4">
				          <h3 id="titulos">Descripción del Proyecto</h3>
				          <p class="text-justify">{{ $datos->descripcion }}</p>

				          <h3 id="titulos">Detalles del Proyecto</h3>
				          <p class="text-justify">{{ $datos->detalle }}</p>
				        </div>

				      </div>
				      <br><br>
				      <!-- /.row -->

				      <!-- Related Projects Row -->
				      <h3 id="titulos">Imagenes del Proyecto <a href="{{ url('/proyectos/imagenes/create/'.$datos->id)}}" class="btn btn-primary">Agregar Imagenes</a></h3>

				      <div class="row">
				      @foreach($fotos as $photo)
				        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 card-grande">
				          <a href="#" class="img-card">
				            <img class="img-thumbnail img-responsive" src="{{ asset('uploads/'.$photo->ruta) }}" alt="" height="100px">
				          </a>
				        </div>
				      @endforeach


				      </div><br><br>
				      <!-- /.row -->

				    </div>
				    <!-- /.container -->

				</section> <!--section proyectos-->
			</div><!--contenido-->
	@stop

