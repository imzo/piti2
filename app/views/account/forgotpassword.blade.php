@extends('layout.html')
@section('title') 
	Forgot Password
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
				<form action="{{ URL::route('account-forgot-password-post') }}" method="post" >
					<!-- Email input -->
					<div class="field">
						<input type="text" class="form-control" name="email" placeholder="Email" {{ (Input::old('email')) ? ' value="'. e(Input::old('email')) .'"' : ''  }}>
						@if($errors->has('email'))
							<div class="alert alert-danger">{{$errors->first('email')}}</div>
						@endif
					</div>

					<input type="submit" class="btn btn-info btn-block" style="margin-top:5px;" value="Recover Account">
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

	