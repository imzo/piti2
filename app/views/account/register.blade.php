@extends('layout.html')
@section('title') 
	Register
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
				<form role="form" action="{{ URL::route('account-register-post') }}" method="post">
					<!-- Email input -->
					<div class="form-group">
				    	<input type="text" class="form-control" name="email" placeholder="Email"  {{ (Input::old('email')) ? ' value="'. e(Input::old('email')) .'"' : ''  }}>
				  		<br>
				  		@if($errors->has('email'))
						<div class="alert alert-danger">{{$errors->first('email')}}</div>
						@endif
				  	</div>
				  	<!-- Username input -->
				  	<div class="form-group"> 
				    	<input type="text" class="form-control" name="username" placeholder="Usuario"  {{ (Input::old('username')) ? ' value="'. e(Input::old('username')) .'"' : ''  }}>
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
				  	<!-- Password again input -->
				  	<div class="form-group">
				    	<input type="password" name="password2" class="form-control" placeholder="Confirme contraseña">
				  		<br>
				  		@if($errors->has('password_again'))
						<div class="alert alert-danger">{{$errors->first('password_again')}}</div>
						@endif
				  	</div>
				  	
					<input type="submit" class="btn btn-info btn-block" style="margin-top:5px;" value="Registrarse">
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