@extends('layout.html')
@section('title') 
	Colesh
@stop
<body>
@section('body') 

@include('layout.navbar')

	<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-image: url('img/collage.jpg');">
      	<div class="container">
       		<div class="row" style="background-image:url('img/collage.jpg);">
          		<div class="col-md-2 ">
          			<!--
          			<div class="bg-primary" style="text-align:center;">
	            		<h3>Bienvenido!</h3>
			            <p><img src="img/profile.jpg" style="height:100px; width:100px" alt="..." class="img-rounded"></p>
			            <p>{{ $user->username }}</p>
          			</div>
          			-->
		        </div>

          		<div class="col-md-10">
              		<div class="input-group" style="margin-top:120px;">
      					<div class="input-group-btn">
					        <button type="button" class="btn btn-default dropdown-toggle btn-lg" data-toggle="dropdown">Categoria<span class="caret"></span></button>
					        <ul class="dropdown-menu">
					        	@foreach($carreras as $carrera)
            					<li><a href="#">{{ e($carrera->nombre) }}</a></li>
						    	@endforeach
        					</ul>
           				</div><!-- /btn-group -->
           				<div class="input-group-btn">
					        <button type="button" class="btn btn-default dropdown-toggle btn-lg" data-toggle="dropdown">Subcategoria <span class="caret"></span></button>
					        <ul class="dropdown-menu">
          						<li><a href="#">Programacion</a></li>
						        <li><a href="#">Redes</a></li>
						        <li><a href="#">Sistemas Operativos</a></li>
						        <li class="divider"></li>
						        <li><a href="#">Otros</a></li>
        					</ul>
      					</div><!-- /btn-group -->
      					<input type="text" class="form-control input-lg">
      					<span class="input-group-btn">
        					<button class="btn btn-primary btn-lg " type="button">Preguntar</button>
      					</span>
    				</div><!-- /input-group -->
  				</div><!-- /.col-md-10 -->
          	</div> <!-- End of row -->
      	</div> <!-- End of container -->
    </div> <!-- End of jumbotron -->

<!-- Content-->
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="panel panel-default panel-categorias">
				  	<div class="panel-heading">
			 			<h2 style="text-align:center;">Categorias</h2>
				  	</div>
				  	<div class="panel-body">
     					<ul class="nav nav-pills nav-stacked">
		         			<li class="active"><a href="#">Recientes</a></li>
		         			<li><a href="#">Sistemas Computacionales</a></li>
		         			<li><a href="#">Sistemas Digitales</a></li>
				            <li><a href="#">Civil</a></li>
				            <li><a href="#">Mecatronica</a></li>
				            <li><a href="#">Mecanica</a></li>
				            <li><a href="#">Electrica</a></li>
				            <li><a href="#">Industrial</a></li>
				            <li><a href="#">Manufactura</a></li>
		      			</ul>
					</div>
				</div>
			</div> <!-- End col-md-3-->
			<div class="col-md-8">

				<!-- Start of panel Preguntas-->
				<div class="panel panel-default panel-preguntas">
				  	<div class="panel-heading">
				    	<div class="h3" style="text-align:center;">Recientes</div>
				  	</div>
				  	<div class="panel-body">
				  		@foreach($preguntas as $pregunta)
				  		<!-- Start of panel pregunta 1-->
						<div class="panel panel-danger">
						  	<div class="panel-heading">
						    	<small class="pull-right">{{ e($pregunta->especialidad->nombre) }}</small>
						    	<h3 class="panel-title">{{ e($pregunta->pregunta) }}</h3>
						  	</div>
						  	<div class="panel-body">
						    	<!-- Begin of answer stuff -->
								<div class="panel panel-default padding10">
									<div class="container">
										<div class="row" >
							  				<div class="col-md-1">
							  					<a href="{{ URL::route('profile-user', $pregunta->usuario->username) }}">
							      					<img src="{{ e($pregunta->usuario->imagen_perfil) }}"  class="img-responsive" alt="Responsive image">
							  					</a>
							  					<div class="h3"><small><a href="{{ URL::route('profile-user', $pregunta->usuario->username) }}">{{ e($pregunta->usuario->username) }}</a></small></div>
						  					</div>
				  							<div class="col-md-6">
				  								<div class="h3"></div>
				  									<div class="panel">
					  									<smail >{{ e($pregunta->descripcion) }}</smail>
				  									</div>
				  									<strong>Fecha: </strong>
				  									<?php
											  			$date = new DateTime($pregunta->fecha_creada, new DateTimeZone('America/Chihuahua'));
														echo $date->format('d/m/Y g:i A') . "\n";
													?>
													<a href="#" class="btn btn-primary pull-right" >
														<span class="glyphicon glyphicon-pencil"></span>
														<!--
														<span class="glyphicon glyphicon-hand-up"></span>
														-->
														Responder
													</a>
				  							</div> 
										</div><!--End row pregunta -->
									</div><!--End container pregunta -->
								</div><!--End panel default -->
							</div><!--End panel body pregunta 1 -->
						</div><!--End panel pregunta 1 danger-->
					    @endforeach


				  	</div> <!--End panel body-->
				</div> <!--End panel preguntas-->
		  	</div> <!-- End col-md-8-->
			<div class="col-md-1" >
			</div>
		</div> <!-- End of row-->
	</div> <!-- End of container-->
	

	<div class="container">
      <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-4">
          <ul class="pagination">
          <li><a href="#">&laquo;</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">&raquo;</a></li>
      </ul></div>
	</div>
@stop
@include('layout.footer')