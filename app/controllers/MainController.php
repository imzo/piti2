<?php

class MainController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Main Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'MainController@showWelcome');
	|
	*/

	public function main()
	{
		$user = Auth::user();
		$carreras = Carrera::all();
		$preguntas = Pregunta::all();
		return View::make('main')->with('user', $user)->with('carreras', $carreras)->with('preguntas', $preguntas);
	}

}