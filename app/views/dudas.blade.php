@extends('layout.html')
@section('title') 
	Dudas y Pendientes
@stop
<body id="body-main">
@section('body') 

@include('layout.navbar')

	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<center>
					<p style="font-size:72px;">Pendientes</p>
				</center> 
				<!-- Start of panel-->
				<div class="panel panel-danger">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">¿Como le vamos a hacer para recordar los ratings que da el usuario a 1 pregunta?</h3>
				  	</div>
				  	<div class="panel-body">
				    	Como vamos a prevenir que el usuario de multiples ratings a 1 pregunta para dar un alto puntaje a 1 sola pregunta
				  	</div>
				</div>
				<!-- End of panel-->

				<!-- Start of panel-->
				<div class="panel panel-danger">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Desabilitar ratings</h3>
				  	</div>
				  	<div class="panel-body">
				    	Debemos desabilitar el rating para las respuestas que dio el mismo usuario.
				  	</div>
				</div>
				<!-- End of panel-->

				<!-- Start of panel-->
				<div class="panel panel-danger">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Diferir de mensaje normal y mensaje de cancelacion de cita</h3>
				  	</div>
				  	<div class="panel-body">
				    	Se le debe dar prioridad a un mensaje de cancelacion de cita, porque era algo importante para el usuario
				  	</div>
				</div>
				<!-- End of panel-->

				<!-- Start of panel-->
				<div class="panel panel-danger">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Query de especialidades segun la carrera</h3>
				  	</div>
				  	<div class="panel-body">
				  		En la ruta /account/update-profile, el query de especialidades actual trae todas las especialidades de una carrera, debemos excluir las que ya pertenecen a el usuario.
				  	</div>
				</div>
				<!-- End of panel-->

				<!-- Start of panel-->
				<div class="panel panel-danger">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Los campos de updateprofile no estan bien validados</h3>
				  	</div>
				  	<div class="panel-body">
				  		Puedes introducir codigo malicioso en la descripcion, nombre y apellido.
				  	</div>
				</div>
				<!-- End of panel-->



				
			</div> <!-- End of col md-6-->
		</div> <!-- End of row-->
	</div> <!-- End of container-->
@stop
@include('layout.footer')