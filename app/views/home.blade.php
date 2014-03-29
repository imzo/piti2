@extends('layout.html')
@section('title') 
	Colesh
@stop
<body id="body-main">
@section('body') 

@include('layout.navbar')
<br>
<br>
<br>
<!-- Jumbotron-->
<div class="container">
	@if(Session::has('global-danger'))
		<div class="alert alert-danger">{{ Session::get('global-danger') }}</div>
	@endif
	@if(Session::has('global-success'))
		<div class="alert alert-success">{{ Session::get('global-success') }}</div>
	@endif
	<div class="jumbotron">
		<div class="row" id="main-content">
			<div class="col-md-8">
				<div class="container" id="logo-container">
					<p style="font-size:16px; color:white;">
						<strong style="color:white; font-size:84px;">CO</strong><strong style="color:white; font-size:64px;">nnect</strong>
						<strong style="color:#428bca; font-size:64px;">LE</strong><strong style="color:white; font-size:44px;">arn</strong>
						<strong style="color:white; font-size:44px;">SH</strong><strong style="color:white; font-size:34px;">are</strong>
						<center style="font-size:16px; color:white;">
							Connect here, Learn here and Share it here.
						</center>
					</p>
					
				</div>
			</div> <!-- End of column 1-->
			<div class="col-md-4" id="sidebar">
				<div class="well">
					<form role="form" action="{{ URL::route('account-register-post') }}" method="post">
						<div class="form-group">
					    	<input type="text" class="form-control" name="email" placeholder="Email">
					  	</div>
						<div class="form-group">
					    	<input type="text" class="form-control" name="username" placeholder="Usuario">
					  	</div>
					  	<div class="form-group">
					    	<input type="password" class="form-control" name="password" placeholder="Contraseña">
					  	</div>
					  	<div class="form-group">
					    	<input type="password" class="form-control" name="password_again" placeholder="Confirmar contraseña">
					  	</div>

						<input type="submit" class="btn btn-info btn-block" style="margin-top:5px;" value="Registrarse">
						{{Form::token() }}
					</form>
				</div> <!-- End of well-->
				
			</div> <!-- End of column 2-->
		</div> <!-- End of row-->
	</div><!-- End of Jumbotron-->
</div><!-- End of outer container-->
@stop
@include('layout.footer')