@extends('layout.html')
@section('title') 
	Iniciar Sesión
@stop
<body id="body-main">
@section('body') 

@include('layout.navbar')
<br>
<br>
<br>

<div class="container">
	<div class="row" id="main-content">
		<div class="col-md-2">
		</div> <!-- End of column 1-->
		<div class="col-md-8" id="sidebar">
				@if(Session::has('global-danger'))
					<div class="alert alert-danger">{{ Session::get('global-danger') }}</div>
				@endif
				@if(Session::has('global-success'))
					<div class="alert alert-danger">{{ Session::get('global-success') }}</div>
				@endif
			<div class="well" id="well-register">
				<form role="form" action="{{ URL::route('account-sign-in-post') }}" method="post">
					<!-- Username input -->
					<div class="form-group">
				    	<input type="text" id="campo-texto-username" name="username" class="form-control" placeholder="Usuario" {{ (Input::old('username')) ? ' value="'. e(Input::old('username')) .'"' : ''  }}>
				  		<br>
				  		@if($errors->has('username'))
						<div class="alert alert-danger">{{$errors->first('username')}}</div>
						@endif
				  	</div>
				  	<!-- Password input -->
				  	<div class="form-group">
				    	<input type="password" name="password" class="form-control" placeholder="Contraseña">
				  		<br>
				  		@if($errors->has('password'))
						<div class="alert alert-danger">{{$errors->first('password')}}</div>
						@endif
				  	</div>

					<label class="checkbox">
						<input type="checkbox" class="input-level" name="recuerdame"> Recordarme
					</label>

					<input type="submit" class="btn btn-primary" value="Iniciar Sesión">
					<a href="{{ URL::route('account-register-get') }}" class="btn btn-info">Registrarse</a>
					<a class="pull-right" href="{{ URL::route('account-forgot-password-get') }}">Olvidé contraseña</a>
					{{Form::token() }}
				</form>
			</div>
		</div> <!-- End of column 2-->
		<div class="col-md-2">
		</div> <!-- End of column 3-->
	</div> <!-- End of row-->
</div><!-- End of outer container-->

@stop
@include('layout.footer')
