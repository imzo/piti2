<?php

/*
	Routes
	+piti2.aws.af.cm 										Home page
	+piti2.aws.af.cm/account/create 						Create Account
	+piti2.aws.af.cm/account/activate-account/{{code}}		Activate Account
	+piti2.aws.af.cm/account/sign-out	 					Sign Out
	+piti2.aws.af.cm/account/sign-in	 					Sign In
	+piti2.aws.af.cm/account/change-password				Change Password
	+piti2.aws.af.cm/account/forgot-password				Forgot Password
	+piti2.aws.af.cm/account/recover-password/{{code}}		Recover Password
	piti2.aws.af.cm/user/{{username}}						User profile
	
*/


	/* Home (GET)  */
	Route::get('/', array(
		'as' => 'home',
		'uses' => 'HomeController@home'
	));

Route::get('/dudas', array(
	'as' => 'dudas',
	'uses' => 'HomeController@getDudas'
));



/* ************ Authenticated group ************ */
Route::group(array('before' => 'auth'), function(){

	/* CSRF protection group */
	Route::group(array('before', 'csrf'), function(){

		/* Change password(POST) */
		Route::post('/account/change-password', array(
			'as' => 'account-change-password-post',
			'uses' => 'AccountController@postChangePassword'
		));

		/* Update profile (POST) */
		Route::post('/account/update-profile', array(
			'as' => 'profile-update-profile-post',
			'uses' => 'ProfileController@postUpdateProfile'
		));
	

	});

	/* Main (GET)  */
	Route::get('/main', array(
		'as' => 'main',
		'uses' => 'MainController@main'
	));

	/* Sing out (GET) */
	Route::get('accout/sign-out', array(
		'as' 	=> 'account-sign-out-get',
		'uses' 	=> 'AccountController@getSignOut'
	));

	/* Change password(GET) */
	Route::get('/account/change-password', array(
		'as' => 'account-change-password-get',
		'uses' => 'AccountController@getChangePassword'
	));

	/* User profile (GET) */
	Route::get('/user/{username}', array(
		'as' => 'profile-user', 
		'uses' => 'ProfileController@user'
	));

	/* Update user profile (GET) */
	Route::get('/account/update-profile', array(
		'as' => 'profile-update-profile-get',
		'uses' => 'ProfileController@getUpdateProfile'
	));

	/* ******** AJAX (GET) ******** */
	Route::post('updateprofile-carrera-select-ajax', array(
		'as' => 'especialidad-nueva',
		'uses' => 'AJAXController@postAJAXUpdateProfile'
	));

});

/* ************ Unauthenticated group ************ */
Route::group(array('before' => 'guest'), function(){

	/* CSRF protection group */
	Route::group(array('before', 'csrf'), function(){

		/* Sign in (POST) */
		Route::post('/account/sign-in', array(
			'as' => 'account-sign-in-post',
			'uses' => 'AccountController@postSignIn'
		));

		/* Register (POST) */
		Route::post('account/register', array(
			'as' => 'account-register-post',
			'uses' => 'AccountController@postRegister' 
		));

		/* Forgot password (POST) */
		Route::post('/account/forgot-password', array(
			'as' => 'account-forgot-password-post',
			'uses' => 'AccountController@postForgotPassword'
		));

	});

	

	/* Sign in (GET) */
	Route::get('/account/sign-in', array(
		'as' => 'account-sign-in-get',
		'uses' => 'AccountController@getSignIn'
	));

	/* Register (GET) */
	Route::get('/account/register', array(
		'as' => 'account-register-get',
		'uses' => 'AccountController@getRegister'
	));

	//Route::get('/account/activate/{variable} == /account/activate/variable
	Route::get('/account/activate/{code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'
	));

	/* Forgot password (GET) */
	Route::get('/account/forgot-password', array(
		'as' => 'account-forgot-password-get',
		'uses' => 'AccountController@getForgotPassword'
	));

	/* Recover password (GET) */
	Route::get('/account/recover/{code}', array(
		'as' => 'account-recover-get', 
		'uses' => 'AccountController@getRecover'
	));


});
