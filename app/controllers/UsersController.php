<?php

class UsersController extends BaseController{

	public $restful = true;
	//protected $hidden = array('password', 'remember_token');
	public function get_new() 
	{
		return View::make('users.new')
				->with('title','Make It Snappy Q&A - Register');
	}

	public function post_create() 
	{
		$validation = User::validate(Input::all());

		if($validation->passes()) 
		{
			User::create(array(
				'username'=>Input::get('username'),
				'password'=>Hash::make(Input::get('password'))
			));

			$user = User::whereUsername(Input::get('username'))->first();
			Auth::login($user);

			return Redirect::to('home')->with('message', 'Thanks for registering. You are now logged in');

		}else{
			return Redirect::to('register')->withErrors($validation)->withInput();
		}
	}

	public function get_login() {
		return View::make('users.login')
				->with('title', 'Make it snappy Q&A - Login');
	}

	public function post_login() {
		$user = array(
			'username'=>Input::get('username'),
			'password'=>Input::get('password')
		);

		if(Auth::attempt($user)) {
			return Redirect::to('home')->with('message', 'You are logged in!');
		} else	{
			return Redirect::to('login')->with('message', 'Your username/password combination was incorrect')
												->with_input();
		}
		
	}

	public function get_logout() {
		if(Auth::check()) {
			Auth::logout();
			return Redirect::to('login')->with('message', 'You are now logged out!');
		} else {
			return Redirect::to('home');
		}
	}
}