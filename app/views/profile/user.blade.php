@extends('layout.html')
@section('title') 
	Profile
@stop
<body>
@section('body') 
@include('layout.navbar')

@if(Session::has('global-danger'))
	<div class="alert alert-danger">{{ Session::get('global-danger') }}</div>
@endif
@if(Session::has('global-success'))
	<div class="alert alert-success">{{ Session::get('global-success') }}</div>
@endif

<!-- Jumbotron-->
		<div class="well">
	<div class="container">
			<div class="row" >
	  			<div class="col-md-3">
	  				<div class="h4">Bienvenido, {{ e($usuario->username) }}</div>
	      				<img src="{{ e($usuario->imagen_perfil) }}" style="width:200px; heght:250px;" class="img-responsive" alt="Responsive image">
  				</div>
	  			<div class="col-md-7">

	  				<div class="h3">Acerca de mi</div>
	  				<div class="panel">
		  				<smail >
		  					{{ e($usuario->descripcion) }}	
		  				</smail>
	  				</div>

	  				<div class="panel panel-primary panel-profile-info">
							<div class="panel-heading panel-title"><h2 class="panel-title"> <span class="glyphicon glyphicon-star-empty"></span> Especialidades <span class="pull-right glyphicon glyphicon-chevron-up"></span></h2></div>
						<div class="panel-body panel-profile-info-body">
							@foreach($usuario->especialidades as $especialidad)
						  		<button class="btn btn-info margintop3"><span class="glyphicon glyphicon-star"></span> {{ e($especialidad->nombre) }}</button>
						    @endforeach
							</div>	
					</div> <!-- End panel Fuertes -->

	  				
	  				<div class="panel panel-primary panel-profile-info">
							<div class="panel-heading panel-title"><h2 class="panel-title"> <span class="glyphicon glyphicon-certificate"></span> Medallas <span class="pull-right glyphicon glyphicon-chevron-up"></span></h2></div>
						<div class="panel-body panel-profile-info-body">
							<div class="row">
								<div class="col-md-3">
									<div class="panel panel-default badge_center_text"><!--Panel badge -->
								  		<div class="panel-body"><img src="/img/badges/badge1.png" style="max-width:70%;" alt="..." >	</div><div class="panel-footer">5 Programming Languages</div>
									</div><!--End panel badge -->

								</div>
								<div class="col-md-3 container">
									<div class="panel panel-default badge_center_text"><!--Panel badge -->
								  		<div class="panel-body"><img src="/img/badges/badge2.png" style="max-width:70%;" alt="..." >	</div><div class="panel-footer">Networking Master</div>
									</div><!--End panel badge -->

								</div>
								<div class="col-md-3">
									<div class="panel panel-default badge_center_text"><!--Panel badge -->
								  		<div class="panel-body"><img src="/img/badges/badge3.png" style="max-width:70%;" alt="..." >	</div><div class="panel-footer">HTML5 conquer</div>
									</div><!--End panel badge -->

								</div>
								<div class="col-md-3">
									<div class="panel panel-default badge_center_text"><!--Panel badge -->
								  		<div class="panel-body"><img src="/img/badges/badge4.png" style="max-width:70%;" alt="..." >	</div><div class="panel-footer">CSS3 Rocker</div>
									</div><!--End panel badge -->

								</div>
							</div>
						</div>
					</div> <!-- End panel panel_badges -->




	  			</div> <!-- End middle column jumbotron -->
	  			<div class="col-md-2">
	  			</div>
			</div>
		</div>
	</div>
	<!-- End of Jumbotron-->

	<!-- Content-->
	<div class="container " >
		<div class="row">
			<div class="col-md-3">

			    <!--Start of nav-pill Updates-->
				<ul class="nav nav-pills nav-stacked" style="max-width: 260px;">
			      	<li class="active nav-pills-updates">
			        	<a href="">
			          		<span class="badge pull-right">5</span>
			          		Actualizaciones
			        	</a>
			      	</li>
			      	<li id="nav-pills-button-messages">
			      		<a href="">
			      			<span class="glyphicon glyphicon-envelope" ></span> 
			      				Mensajes
			          		<span class="badge pull-right"></span>
			      		</a>
			      	</li>
			      	<li id="nav-pills-button-answers">
			        	<a href="">
			        		<span class="glyphicon glyphicon-exclamation-sign" ></span>
				          		Respuestas
				          	<span class="badge pull-right">1</span>
			        	</a>
			      	</li>
			      	<li id="nav-pills-button-questions">
			        	<a href="" >
			        		<span class="glyphicon glyphicon-question-sign" ></span>
				          		Preguntas
				          	<span class="badge pull-right">4</span>
			        	</a>
			      	</li>
			    </ul>
			    <!--End of nav-pill Updates-->
			    <!--Start of nav-pill Activities-->
				<ul class="nav nav-pills nav-stacked margintop3" style="max-width: 260px;">
			      	<li class="active" id="button-activities">
			        	<a href="">Actividades</a>
			      	</li>
			    </ul>
			    <!--End of nav-pill Activities-->
			</div>
			<div class="col-md-8">
				<!-- Start of panel Activities-->
				<div class="panel panel-default panel-activities">
				  	<div class="panel-heading">
				    	<!-- Nav tabs -->
						<ul class="nav nav-tabs">
						  	<li class="active"><a href="#home" data-toggle="tab">Mis videos</a></li>
						  	<li><a href="#profile" data-toggle="tab">Mis Preguntas</a></li>
						  	<li><a href="#messages" data-toggle="tab">Mis Respuestas</a></li>
						</ul>
				  	</div>
				  	<div class="panel-body">
				    	<!-- Tab panes -->
						<div class="tab-content">
						  	<div class="tab-pane fade in active" id="home">
						  		<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default badge_center_text"><!--Panel badge -->

									  		<div class="panel-body " data-toggle="modal" data-target="#modal-video1"><img src="/img/video1thumb.png" id="video1thumb" style="max-width:70%;" alt="..." >	</div><div class="panel-footer">How to install Laravel 4</div>
										</div><!--End panel badge -->

									</div>
									<div class="col-md-3">
										<div class="panel panel-default badge_center_text"><!--Panel badge -->
									  		<div class="panel-body" data-toggle="modal" data-target="#modal-video2"><img src="/img/video2thumb.png" id="video2thumb" style="max-width:70%;" alt="..." >	</div><div class="panel-footer">How to create SSL Certificate</div>
										</div><!--End panel badge -->
									</div>
									<div class="col-md-3">
									</div>
									<div class="col-md-3">
									</div>
								</div>
						  	</div>
						  	<div class="tab-pane fade" id="profile">
						  		@foreach($usuario->preguntas as $pregunta)
						  		<!-- Start of panel-->
								<div class="panel panel-danger">
								  	<div class="panel-heading">
								    	<small class="pull-right">{{ e($pregunta->especialidad->nombre) }}</small>
								    	<h3 class="panel-title">{{ e($pregunta->pregunta) }}</h3>
								  	</div>
								  	<div class="panel-body">
								  		{{ e($pregunta->descripcion) }}
								  	</div>
								  	<div class="panel-footer">
								  		<span class="pull-right">
								  		<?php
								  		$date = new DateTime($pregunta->fecha_creada, new DateTimeZone('America/Chihuahua'));
										echo $date->format('d/m/Y g:i A') . "\n";
										?>
								  		</span>
								  		<br>
  									</div>
								</div>
								<!-- End of panel-->
						    	@endforeach
						  	</div>
						  	<div class="tab-pane fade" id="messages">
						  		<!-- Start of panel-->
								<div class="panel panel-danger">
								  	<div class="panel-heading">
								    	<h3 class="panel-title">¿Cómo realizar una busqueda Breath-First (Busqueda en anchura)?</h3>
								  	</div>
								  	<div class="panel-body">
								    	Sed pellentesque, diam sit amet pharetra gravida, dolor nunc interdum tortor, non consequat sapien magna a ante. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin sed ipsum mi. Aenean euismod eu lorem ac consequat. Nullam gravida non tellus a volutpat.
								  	</div>
  									<div class="panel-footer">
								    	<h3 >Mi respuesta <span class="glyphicon glyphicon-pencil"></span></h3>

  										 Mauris condimentum quam quis ipsum euismod mattis. Proin id elit velit. Nullam ullamcorper accumsan pellentesque. Nulla gravida tortor et aliquet vulputate. Quisque rutrum pellentesque metus. Ut interdum augue at fermentum pulvinar. Vivamus vel est lectus<br><img src="/img/respuesta1.jpg"> <br>Nam sed volutpat nulla. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras consequat metus nec lacus suscipit elementum. Duis sed gravida massa. Maecenas eu diam metus. Maecenas ligula mauris, convallis vel lobortis ac, tincidunt id eros. Fusce in leo gravida, sodales nisi eget, mattis tortor.
  									</div>
								</div>
								<!-- End of panel-->
						  	</div>
						</div>
				  	</div>
				</div>
				<!-- End of panel Activities-->

				<!-- Start of panel Messages-->
				<div class="panel panel-default panel-messages">
				  	<div class="panel-heading">
				    	Messages
				  	</div>
				  	<div class="panel-body">
				    	<!-- Begin of mensaje stuff -->
						<div class="panel panel-default">
							<div class="container">
								<div class="row" >
					  				<div class="col-md-1">
					      				<img src="/img/profile.jpg" class="img-responsive" alt="Responsive image">
					  					<div class="h3"><small><a href="">Narciso Floresence</a></small></div>
				  					</div>
		  							<div class="col-md-6">
		  								<div class="h3"></div>
		  									<div class="panel">
			  									<smail >Lorem ipsum dolor sit amet, orper at libero eu tincidunt.</smail>
		  									</div>
		  									<strong>Fecha: </strong>17/ene/2014

		  							</div> 
								</div><!--End row mensaje -->
							</div><!--End container mensaje -->
						</div><!--End panel mensaje -->
				  	</div>
				</div>
				<!-- End of panel Messages-->

				<!-- Start of panel Questions-->
				<div class="panel panel-default panel-questions">
				  	<div class="panel-heading">
				    	Questions
				  	</div>
				  	<div class="panel-body">
				    	<div class="panel panel-danger">
						  	<div class="panel-heading">
						    	<h3 class="panel-title">¿Comó realizar cierta acción en cierto lenguaje de programación?</h3>
						  	</div>
						</div>
						<div class="panel panel-danger">
						  	<div class="panel-heading">
						    	<h3 class="panel-title">¿Comó realizar esta otra acción en este otro lenguaje de programación?</h3>
						  	</div>
						</div>

						<div class="panel panel-danger">
						  	<div class="panel-heading">
						    	<h3 class="panel-title">¿Comó ir de punto A a punto B?</h3>
						  	</div>
						</div>
				  	</div>
				</div>
				<!-- End of panel Questions-->

				<!-- Start of panel Answers-->
				<div class="panel panel-default panel-answers">
				  	<div class="panel-heading">
				    	Questions
				  	</div>
				  	<div class="panel-body">
						<div class="panel panel-danger">
						  	<div class="panel-heading">

						    	<h3 class="panel-title">Mi pregunta <span class="glyphicon glyphicon-question-sign"></span><br>¿Cómo realizar una conexion la base de datos en Java para una aplicación RESTful?</h3>
						  	</div>
						  	<div class="panel-body">
						    	<!-- Begin of answer stuff -->
								<div class="panel panel-default">
									<div class="container">
										<div class="row" >
							  				<div class="col-md-1">
							      				<img src="/img/profile.jpg" class="img-responsive" alt="Responsive image">
							  					<div class="h3"><small><a href="">Narciso Floresence</a></small></div>
						  					</div>
				  							<div class="col-md-6">
				  								<div class="h3"></div>
				  									<div class="panel">
					  									<smail >Lorem ipsum dolor sit amet, orper at libero eu tincidunt.</smail>
				  									</div>
				  									<strong>Fecha: </strong>17/ene/2014

				  							</div> 
										</div><!--End row respuesta -->
									</div><!--End container respuesta -->
								</div><!--End panel respuesta -->

								<!-- Begin of answer stuff -->
								<div class="panel panel-default">
									<div class="container">
										<div class="row" >
							  				<div class="col-md-1">
							      				<img src="/img/profile.jpg" class="img-responsive" alt="Responsive image">
							  					<div class="h3"><small><a href="">Stat Quo</a></small></div>
						  					</div>
				  							<div class="col-md-6">
				  								<div class="h3"></div>
				  									<div class="panel">
					  									<smail >Lorem ipsum dolor sit amet, orper at libero eu tincidunt.</smail>
				  									</div>
				  									<strong>Fecha: </strong>17/ene/2014

				  							</div> 
										</div><!--End row respuesta -->
									</div><!--End container respuesta -->
								</div><!--End panel respuesta -->
						  	</div>
						</div>
				  	</div>
				</div>
				<!-- End of panel Answers-->


			</div><!--End column md-8 -->

			<div class="col-md-1" >
			</div>
		</div>
	</div>
	<!-- End of Content-->


	<!-- Modal video1-->
	<div class="modal fade" id="modal-video1" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
	  			<div class="modal-header">
	    			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    			<h4 class="modal-title" id="myModalLabel">How to install Laravel 4</h4>
	  			</div>
	  			<div class="modal-body">
	  				<center>
  						<video class="video-profile" id="video1" src="/video/video1.mp4" width="720" height="480" controls></video>
	  				</center>
	  			</div>
			</div>
		</div>
	</div>

	<!-- Modal video2-->
	<div class="modal fade" id="modal-video2" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
	  			<div class="modal-header">
	    			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    			<h4 class="modal-title" id="myModalLabel">How to create SSL Certificate</h4>
	  			</div>
	  			<div class="modal-body">
	  				<center>
  						<video class="video-profile" id="video2" src="/video/video2.mp4" width="720" height="480" controls></video>
	  				</center>
	  			</div>
			</div>
		</div>
	</div>
@stop

@include('layout.footer')
