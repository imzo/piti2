@extends('layout.html')
@section('title') 
	Change Password
@stop
<body>
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
				<form action="{{ URL::route('account-change-password-post') }}" method="post">
					<!-- Old pasword input -->
					<div class="form-group"> 
				    	<input type="password" class="form-control" name="old_password" placeholder="Old Password">
				  		<br>
				  		@if($errors->has('email'))
						<div class="alert alert-danger">{{$errors->first('email')}}</div>
						@endif
				  	</div>
				  	<!-- New password input -->
				  	<div class="form-group">
				    	<input type="password" class="form-control" name="new_password" placeholder="New password">
				  		<br>
				  		@if($errors->has('username'))
						<div class="alert alert-danger">{{$errors->first('username')}}</div>
						@endif
				  	</div>
				  	<!-- New password again input -->
				  	<div class="form-group">
				    	<input type="password" class="form-control" name="new_password_again" placeholder="New Password Again">
				  		<br>
				  		@if($errors->has('password'))
						<div class="alert alert-danger">{{$errors->first('password')}}</div>
						@endif
				  	</div>

					<input type="submit" class="btn btn-info btn-block" style="margin-top:5px;" value="Change Password">
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