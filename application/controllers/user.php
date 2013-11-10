<?php
	class User_Controller extends Base_Controller
	{	

		public $restful = true;

		public function get_login()
		{	if (Auth::check()){
				return Redirect::to_route('home');
			}
			return View::make('login.index');
		}

		public function post_login()
		{
			$user = array(
		        'username' => Input::get('username'),
		        'password' => Input::get('password')
    		);

			if (Auth::attempt($user)) 
			{
				if(Session::has('pre_login_url'))
				{
					$url = Session::get('pre_login_url');
					Session::forget('pre_login_url');
					return Redirect::to($url);
				}
				else
				{	
					return Redirect::to_route('home')
					->with('flash_notice', 'You are successfully logged in.');
				}
			} 
			else
			{
			return Redirect::to_route('login')->
			with('flash_error','E-mail e/ou senha inválidos, tente novamente');
			}
		}

		public function get_logout()
		{
			Auth::logout();
			return Redirect::to_route('home');
		}
	}
?>