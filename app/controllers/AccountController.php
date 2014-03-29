<?php
class AccountController extends BaseController{

	public function getSignOut(){
		Auth::logout();
		return Redirect::route('home');
	}
	/* ************************* SIGN IN ************************* */
	public function getSignIn(){
		return View::make('account.signin');
	}

	public function postSignIn(){
		$validator = Validator::make(Input::all(),array(
			'username' 	=> 'required|max:20|min:3',
			'password' 		=> 'required'
		));

		$recuerdame = Input::get('recuerdame');

		if($validator->fails()){
			//Redirect to sign in page
			return Redirect::route('account-sign-in-get')
			->withErrors($validator)
			->withInput();
		}
		else{ //If validation is successfuls
			//Atempt to sign the user in
			$auth = Auth::attempt(array(
				'username' 	=> Input::get('username'),
				'password' 			=> Input::get('password'),
				'activo' 			=> 1
 			), $recuerdame);

 			if ($auth) {
 				//Redirect to main page (Diego)
 				return Redirect::intended('/main');
 			} else {
 				return Redirect::route('account-sign-in-get')->with('global-danger', 'La combinación Usuario/Contraseña es incorrecta. ')->withInput();
 			}
 			
		}
		//If everything fails
		return Redirect::route('account-sign-in')
				->with('global-danger', 'Existe un problema en el inicio de sesión, ¿Has activado tu cuenta?');
	}



	/* ************************* REGISTER ************************* */
	public function getRegister(){
		return View::make('account.register');
	}

	public function postRegister(){
		$validator = Validator::make(Input::all(), array(
			'email' 		=> 'required|email|max:50|unique:usuario,email',
			'username' 		=> 'required|min:3|max:20|unique:usuario,username',
			'password'		=> 'required|min:6|max:50',
			'password2'		=> 'required|same:password'
		));
		if ($validator->fails()) {
			return Redirect::route('account-register-get')->withErrors($validator)->withInput();
		} else {
			//Create account
			$email = Input::get('email');
			$username = Input::get('username');
			$password = Input::get('password');
			//Activation code
			$code = str_random(60);

			$usuario = Usuario::create(array(
				'email' 	=> $email,
				'username'	=> $username,
				'password' 	=> Hash::make($password),
				'codigo'	=> $code,
				'activo' 	=> 1
			));//Create method is part of class ELoquent
		}
		if($usuario){
			//Send email
			Mail::send('emails.auth.activate', array('link'=> URL::route('account-activate', $code), 'username'=> $username), function($message) use ($usuario) {
				$message->to($usuario->email, $usuario->username)->subject('Activate your account');
			});
			/* Sign in the user right after it registered */
			//Atempt to sign the user in
			$auth = Auth::attempt(array(
				'username' 	=> Input::get('username'),
				'password' 	=> Input::get('password'),
				'activo' 	=> 1
 			));

			return Redirect::route('profile-update-profile-get')->with('global-success', 'Tu cuenta ha sido creada! Porfavor ingresa tu información básica.');
		}
		
	}//End postRegister

	/* ************************* ACTIVATE ************************* */
	public function getActivate($code){
		$user = User::where('code', '=', $code)->where('active', '=', 0);

		if ($user->count()) { //if user exists
			$user = $user->first();
			$user->active 	= 1;
			$user->code 	= '';
			if($user->save()){//if user was update successfully
				return Redirect::route('home')->with('global-success', 'Tu cuenta ha sido activada! Ahora puedes iniciar sesión.');

			}
		}

		return Redirect::route('home')->with('global-danger', 'Tu cuenta no pudo ser activada. Intentalo de nuevo.');
	}//End getActivate


	/* ************************* CHANGE PASSWORD ************************* */
	public function getChangePassword(){
		return View::make('account.changepassword');
	}

	public function postChangePassword(){
		$validator = Validator::make(Input::all(), array(
			'old_password' 		=> 'required',
			'new_password'			=> 'required|min:6',
			'new_password_again'	=> 'required|same:new_password'
		));

		if ($validator->fails()) {
			return Redirect::route('account-change-password-get')->withErrors($validator);
		} else {
			//Change password
			$user = User::find(Auth::user()->id);
			$old_password = Input::get('old_password');
			$new_password = Input::get('new_password');
			if (Hash::check($old_password, $user->getAuthPassword())) {
				# Password user provided correct password
				$user->password = Hash::make($new_password);
				if ($user->save()) {
					return Redirect::route('home')->with('global-success', 'Tu contraseña ha sido cambiada con exito!.');
				}
			}
			else{
				return Redirect::route('account-change-password')->with('global-danger', 'Tu contraseña actual no es la correcta.');
			}
		}

		return Redirect::route('account-change-password')->with('global-danger', 'Tu contraseña no pudo ser cambiada, intentalo de nuevo.');
		
	}
	
	/* ************************* FORGOT PASSWORD ************************* */
	public function getForgotPassword(){
		return View::make('account.forgotpassword');
	}

	public function postForgotPassword(){
		$validator = Validator::make(Input::all(), array(
			'email' => 'required|email'
		));

		if ($validator->fails()) {
			return Redirect::route('account-forgot-password-get')->withErrors($validator)->withInput();
		} else {
			//Change password
			$user = User::where('email', '=' , Input::get('email'));
			if ($user->count()) {
				$user = $user->first();
				//Generate new code and password
				$code 					= str_random(60);
				$password_temp 			= str_random(10);

				$user->code 			= $code;
				$user->password_temp 	= Hash::make($password_temp);

				if($user->save()){
					//Send email
					Mail::send('emails.auth.forgotpassword', array( 'link' => URL::route('account-recover-get', $code), 'username' 	=> $user->username, 'password' 	=> $password_temp), function($message) use ($user){
						$message->to($user->email, $user->username)->subject('New password');
					});

					return Redirect::route('home')->with('global-success', 'Te hemos enviado la contraseña por correo.');
				}

			} else { //No email was found in the database
				# code...
			}
			

		}

		return Redirect::route('account-forgot-password')->with('global-danger', 'Error, la contraseña no pudo ser generada.');
		
	}


	/* ************************* RECOVER PASSWORD ************************* */
	public function getRecover($code){
		$user = User::where('code', '=', $code)->where('password_temp', '!=', '');

		if ($user->count()) {
			$user = $user->first();
			$user->password = $user->password_temp;
			$user->password_temp = '';
			$user->code = '';

			if ($user->save()) {
				return Redirect::route('home')->with('global-success', 'Your account has been recovered and you can sign in with your new password.');
			} else {
				# code...
			}
			

		} else {
			# code...
		}

		return Redirect::route('home')->with('global-danger', 'Could not recover your account.');
		
	}

}