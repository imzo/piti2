<!-- Navbar-->
<div class="navbar navbar-inverse navbar-static-top" id="navbar-colesh">
	<div class="container">
		@if(Auth::check())
			<a class="navbar-brand" href="{{ URL::route('main') }}"><strong style="color:white; font-size:54px;">CO</strong><strong style="color:#428bca; font-size:34px;">LE</strong><strong style="color:white; font-size:24px;">SH</strong></a>
		@else
			<a class="navbar-brand" href="{{ URL::route('home') }}"><strong style="color:white; font-size:54px;">CO</strong><strong style="color:#428bca; font-size:34px;">LE</strong><strong style="color:white; font-size:24px;">SH</strong></a>
		@endif
		<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<div class="collapse navbar-collapse navHeaderCollapse">
			<ul class="nav navbar-nav navbar-right">
				@if(Request::is('/')) <!--If request is home page -->
				@else
				@endif 
				@if(Auth::check())
					<li class="active"><a href="{{ URL::route('main') }}">Inicio</a></li>
					<li><a href="{{ URL::route('profile-user', Auth::user()->username) }}">{{ Auth::user()->username }}</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Configuraciones <span class="glyphicon glyphicon-cog"></span></a>
						<ul class="dropdown-menu">
							<li><a href="{{ URL::route('account-change-password-get') }}">Cambiar contraseña</a></li>
							<li><a href="{{ URL::route('profile-update-profile-get') }}">Editar Perfil</a></li>
						</ul>
					</li>
					<li><a href="{{ URL::route('account-sign-out-get') }}">Cerrar Sesión</a></li>
				@else
					<li>
						@if(Request::is('/')) <!--If request is home page -->
						<div class="nav row-fluid">
							<form role="form" style="margin-bottom:0px; margin-top:5px;" action="{{ URL::route('account-sign-in-post') }}" class="login" method="post">
                        		<div class="span5 offset7 form-inline">
						    	<input type="text" class="form-control" id="campo-texto-username" name="username" placeholder="Usuario">
                                <input type="password" class="form-control" name="password" placeholder="Contraseña">
								<input type="submit" class="btn btn-primary" value="Iniciar sesión">
                         		</div>
						    	<label class="checkbox" style="color:white; margin-bottom:5px;">
									<input type="checkbox" class="input-level" name="recuerdame"> Recordarme
								</label>
								{{Form::token() }}
                            </form>
                    	</div>
					</li>
                        @else
                        @endif
					
				@endif
				
			</ul>
		</div>
	</div>
</div>
<!-- End of navigation bar-->


