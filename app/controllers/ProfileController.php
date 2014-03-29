<?php

class ProfileController extends BaseController{

	public function user($username){
		$usuario = Usuario::where('username', '=', $username);
		
		if ($usuario->count()) {
			$usuario = $usuario->first();
			if ($usuario->id == Auth::user()->id) {
				return View::make('profile.user')->with('usuario', $usuario);
			} else {
				return View::make('profile.other_user')->with('usuario', $usuario);
			}
			 
		}

		return App::abort(404);
	}

	public function getUpdateProfile(){
		$usuario = Auth::user();

		$carreras = Carrera::where('id', '!=', '1')->get();
		$carreras = Carrera::all();
		//$users_carrera_id = Auth::user()->carrera_id;
		//echo '<pre>';
	    //print_r(Auth::user()->carrera_id);
	    //echo '</pre>';


		/*
		$especialidades = 
		Especialidad::leftJoin('usuario_especialidad', 'id', '=', 'usuario_especialidad.especialidad_id' )
		->whereRaw('usuario_especialidad.especialidad_id IS NULL')
		->join('carrera_especialidad', 'carrera_especialidad.especialidad_id', '=', 'especialidad.id')
		->where('carrera_especialidad.carrera_id', '=', 1)
		->get();
		*/
		/*$especialidades = Especialidad::join('usuario_especialidad AS tempo', 'tempo.especialidad_id', '=', 'id')
		->where('tempo.usuario_id', '=', 8)
		->leftJoin('carrera_especialidad', 'tempo.especialidad_id', '=', 'carrera_especialidad.especialidad_id' )
		->whereRaw('carrera_especialidad.especialidad_id IS NULL')
		->get();
		echo '<pre>';
	    print_r($especialidades);
	    echo '</pre>';
		*/
		$especialidades = 
		Especialidad::join('carrera_especialidad', 'carrera_especialidad.especialidad_id', '=', 'especialidad.id')
		//->join('usuario_especialidad', 'carrera_especialidad.especialidad_id', '=', 'usuario_especialidad.especialidad_id')
		->where('carrera_id', '=', 1)->get();

		if ($especialidades->count()) {
			return View::make('account.updateprofile')->with('usuario', $usuario)->with('carreras', $carreras)->with('especialidades', $especialidades);
		}

		
		return App::abort(404);
	}

	public function postUpdateProfile(){

		$input = Input::all();
		$input['nombre'] = filter_var($input['nombre'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		$input['apellido'] = filter_var($input['apellido'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		$input['descripcion'] = filter_var($input['descripcion'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		$rules = array(
			'nombre' 	=> 'required|max:20|min:3',
			'apellido' 	=> 'required|max:20|min:3',
			'descripcion' => 'max:300'
		);
		if (isset($input['foto'])) { //If a photo was uploaded
			$rules['foto'] = 'image|max:500';
		}
		$validator = Validator::make($input, $rules);

		if($validator->fails()){
			//Redirect to sign in page
			return Redirect::route('profile-update-profile-get')
			->withErrors($validator);
		}else{
			if (Input::hasFile('foto')) { //If a photo was uploaded
				$extension = Input::file('foto')->getClientOriginalExtension();
				$directory = public_path() . '/photo_uploads/' . sha1(Auth::user()->id) . '/';
				$filename = str_random(10) . ".{$extension}";
				/*
				echo '<pre>';
					print_r($input);
					print_r($directory);
					print_r($filename);
				echo '</pre>';
				*/
				$date = new DateTime('now', new DateTimeZone('America/Chihuahua'));
				echo $date->format('Y-m-d H:i:s') . "\n";

				
				$old_imagen_perfil = Auth::user()->imagen_perfil;
				File::delete(public_path() . $old_imagen_perfil);
				$upload_success = Input::file('foto')->move($directory, $filename);

				$directory = '/photo_uploads/' . sha1(Auth::user()->id) . '/';
				$usuario = Auth::user();
				$usuario->nombre = $input['nombre'];
				$usuario->apellido = $input['apellido'];
				$usuario->descripcion = $input['descripcion'];
				$usuario->imagen_perfil = $directory.$filename;
				
				if($usuario->save()){//if user was update successfully
					//return Redirect::route('profile-user', array('username' => $usuario->username))->with('usuario', $usuario)->with('global-success', 'La información de tu perfil ha sido actualizada con éxito.');
				}else{
					//return Redirect::route('profile-user', array('username' => $usuario->username))->with('usuario', $usuario)->with('global-danger', 'Hubo un error en la actualización de tu perfil, intentalo de nuevo.');

				}

			}else{ //If no photo was uploaded
				/*
				/var/www/start-piti-laravel-bootstrap/public/photo_uploads/23/7057455517780831e7edf0a764ad75dfb5091477.jpg
				*/

				$usuario = Auth::user();
				$usuario->nombre = $input['nombre'];
				$usuario->apellido = $input['apellido'];
				$usuario->descripcion = $input['descripcion'];
				
				if($usuario->save()){//if user was update successfully
					return Redirect::route('profile-user', array('username' => $usuario->username))->with('usuario', $usuario)->with('global-success', 'La información de tu perfil ha sido actualizada con éxito.');
				}else{
					return Redirect::route('profile-user', array('username' => $usuario->username))->with('usuario', $usuario)->with('global-danger', 'Hubo un error en la actualización de tu perfil, intentalo de nuevo.');
					
				}
			}
			
			
		}

	}
}