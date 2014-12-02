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

			return Redirect::to('home')->with('message', 'Thanks for registering');

		}else{
			return Redirect::to('register')->withErrors($validation)->withInput();
		}
	}
}