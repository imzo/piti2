<?php

class AJAXController extends BaseController{

	public function user($username){
		$user = User::where('username', '=', $username);

		if ($user->count()) {
			$user = $user->first();
			return View::make('profile.user')->with('user', $user);
		}

		return App::abort(404);
	}

	public function postAJAXUpdateProfile(){
		$carrera_id = Input::get('id');
		$carreras = Carrera::all();

		$especialidades = 
		Especialidad::join('carrera_especialidad', 'carrera_especialidad.especialidad_id', '=', 'especialidad.id')
		//->join('usuario_especialidad', 'carrera_especialidad.especialidad_id', '=', 'usuario_especialidad.especialidad_id')
		->where('carrera_id', '=', $carrera_id)->get();
		$arr = array('especialidades' => $especialidades );
		//return Response::json(array('especialidades' => $especialidades) );
			//return View::make('account.updateprofile')->with('carreras', $carreras)->with('especialidades', $especialidades);
		return $especialidades;
		//return json_encode($arr);
	}
}