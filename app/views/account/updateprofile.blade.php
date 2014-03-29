@extends('layout.html')
@section('title') 
	Update Profile
@stop
<body>
@section('body') 

@include('layout.navbar')
<br>
<br>
<br>

<div class="container">
	@if(Session::has('global-danger'))
		<div class="alert alert-danger">{{ Session::get('global-danger') }}</div>
	@endif
	@if(Session::has('global-success'))
		<div class="alert alert-success">{{ Session::get('global-success') }}</div>
	@endif
	<div class="row" id="main-content">
		<div class="col-md-1">
		</div> <!-- End of column 1-->
		<div class="col-md-10">

			<div class="well" id="well-register">
				{{ Form::open( array('route' => 'profile-update-profile-post', 'method' => 'post', 'files'=> true, 'enctype'=>'multipart/form-data') ); }}
					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
						    	<label >Nombre</label>
						    	<input type="text" class="form-control" value="{{ $usuario->nombre }}" name="nombre">
						  		<br>
						  		@if($errors->has('nombre'))
									<div class="alert alert-danger">{{$errors->first('nombre')}}</div>
								@endif
						  	</div>
						</div> <!-- End of column 1-->
						<div class="col-md-2">
						</div> <!-- End of column 2-->
						<div class="col-md-5">
						  	<div class="form-group">
						    	<label >Apellido</label>
						    	<input type="text" class="form-control" value="{{ $usuario->apellido }}" name="apellido">
						  		<br>
						  		@if($errors->has('apellido'))
									<div class="alert alert-danger">{{$errors->first('apellido')}}</div>
								@endif
						  	</div>
						</div> <!-- End of column 3-->
					</div>

				  	<div class="form-group">
				   	 	<label>Elige una imagen para tu perfil</label>
				   	 	{{  Form::file('foto', array('id' => 'uploadImage'));  }}
			    		<img id="uploadPreview" style="width: 200px; height: 200px;" />
			    		<br>
				  		@if($errors->has('foto'))
						<div class="alert alert-danger">{{$errors->first('foto')}}</div>
						@endif
				  	</div>
				  	<div class="form-group">
				   	 	<label>Descripción</label>
				    	<textarea class="form-control" placeholder="Escribe un poco acerca de tí..." rows="4" name="descripcion">{{ $usuario->descripcion }}</textarea>
				  		<br>
				  		@if($errors->has('descripcion'))
						<div class="alert alert-danger">{{$errors->first('descripcion')}}</div>
						@endif
				  	</div>
				  	<div class="form-group">
				      	<label for="select_carrera">Selecciona tu carrera</label>
			      		<select id="select_carrera" class="form-control">
						    @foreach($carreras as $carrera)
						        <option data-value-id="{{ e($carrera->id) }}" >{{ e($carrera->nombre) }}</option>
						    @endforeach
				      	</select>
				    </div>

							<div class="form-group">
				    <div class="row">
						<div class="col-md-5" id="especialidades-col-1">
						    	@foreach($especialidades as $especialidad)
						    		@if($especialidad->id % 2)
							         	
									@else
										<label class="checkbox-inline" style="margin-left:10px;">
								  			<input type="checkbox" value="{{ e($especialidad->nombre) }}" name="especialidad[]"> {{ e($especialidad->nombre) }}
										</label>
										<br>
									@endif
							    @endforeach
						</div> <!-- End of column 1-->
						<div class="col-md-5" id="especialidades-col-2">
							@foreach($especialidades as $especialidad)
						    		@if($especialidad->id % 2)
							         	<label class="checkbox-inline" style="margin-left:10px;">
								  			<input type="checkbox" value="{{ e($especialidad->nombre) }}" name="especialidad[]"> {{ e($especialidad->nombre) }}
										</label>
										<br>
									@endif
							    @endforeach
						</div> <!-- End of column 2-->
					</div>
						    </div>

			  		<button type="submit" class="btn btn-primary btn-block">Actualizar perfil</button>
			</form>
			</div>
		</div> <!-- End of column 2-->
		<div class="col-md-1">
		</div> <!-- End of column 3-->
	</div> <!-- End of row-->
</div><!-- End of outer container-->

@stop
@include('layout.footer')
