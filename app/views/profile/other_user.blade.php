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

	<!-- Well-->
		<div class="well">
	<div class="container">
			<div class="row" >
	  			<div class="col-md-3">
	  				<div class="h2">{{ e($usuario->username) }}</div>
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
							<div class="panel-heading panel-title"><h2 class="panel-title">Badges <span class="pull-right glyphicon glyphicon-chevron-up"></span></h2></div>
						<div class="panel-body panel-profile-info-body">
							<div class="row">
								<div class="col-md-3">
									<div class="panel panel-default badge_center_text"><!--Panel badge -->
								  		<div class="panel-body"><img src="/img/badges/badge1.png" style="max-width:70%;" alt="..." >	</div><div class="panel-footer">5 Programming Languages</div>
									</div><!--End panel badge -->
									<div class="panel panel-default badge_center_text"><!--Panel badge -->
									  	<div class="panel-body"><img src="/img/badges/badge5.png" style="max-width:70%;" alt="..." >	</div><div class="panel-footer">jQuery King</div>
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
	  				<div class="h3">Comunicate</div>
	  					<!-- Button trigger modal -->
						<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">
							<span class="glyphicon glyphicon-envelope" ></span>
							<b>Enviar mensaje</b>
						</button>

						<button class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">
							<span class="glyphicon glyphicon-facetime-video" ></span>
							<!--
							<span class="glyphicon glyphicon-earphone" ></span>
							<span class="glyphicon glyphicon-bullhorn" ></span>
							 -->
							<b>Video-llamada</b>
						</button>

						<button class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">
							<span class="glyphicon glyphicon-film" ></span>
							<!--
							<span class="glyphicon glyphicon-hd-video" ></span>
							 -->
							<b>Compartir pantalla</b>
						</button>

	  			</div>
			</div>
		</div>
	</div>
	<!-- End of Jumbotron-->

		<!-- Content-->
	<div class="container">
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
				<!-- Start of panel-->
				<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<!-- Nav tabs -->
						<ul class="nav nav-tabs">
						  	<li class="active"><a href="#home" data-toggle="tab">Videos</a></li>
						  	<li><a href="#profile" data-toggle="tab">Questions</a></li>
						  	<li><a href="#messages" data-toggle="tab">Answers</a></li>
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
						  		<!-- Start of panel-->
								<div class="panel panel-danger">
								  	<div class="panel-heading">
								    	<h3 class="panel-title">¿Cómo realizar una conexion la base de datos en Java para una aplicación RESTful?</h3>
								  	</div>
								  	<div class="panel-body">
								    	Quisiera saber si alguien me podria ayudar dandome una sesión sobre como realizar una conexión ala base de datos en <b>Java</b>, estoy utilizando <b>JPA</b> hacer una representación de la base de datos y hacer queries, y estoy utilizando <b>Session Beans</b> para obtener métodos de acceso a las entidades.
								    	El problema es que no se como funcionan los facades y tengo problemas para crearlos segun las tablas que tengo en la base de datos.
								  	</div>
								</div>
								<!-- End of panel-->
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
						</div><!-- End of tab content-->
				  	</div>
				</div>
				<!-- End of panel-->
				

					
			</div><!--End column md-8 -->

			<div class="col-md-2" >
			</div>
		</div>
	</div>
	<!-- End of Content-->



	<!-- Modal send message-->
	<div class="modal fade" id="myModal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
	  			<div class="modal-header">
	    			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    			<h4 class="modal-title" id="myModalLabel">Send a message to {{$usuario->username}}</h4>
	  			</div>
	  			<div class="modal-body">
  					<textarea class="form-control" placeholder="Your message here..." rows="4"></textarea>
	  			</div>
		  		<div class="modal-footer">
		    		<button type="button" class="btn btn-default" data-dismiss="modal">Send</button>
		  		</div>
			</div>
		</div>
	</div>

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
  						<video class="video-profile" id="video1" src="video/video1.mp4" width="720" height="480" controls></video>
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
  						<video class="video-profile" id="video2" src="video/video2.mp4" width="720" height="480" controls></video>
	  				</center>
	  			</div>
			</div>
		</div>
	</div>
@stop

@include('layout.footer')