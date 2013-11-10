<?php
    require('vendor/facebook/facebook.php');

	class Usernetwork_Controller extends Base_Controller
	{
        public $restful = true;

		public function get_fblogin(){
			$facebook = new Facebook(Config::get('facebook'));
	    	$params = array(
		        'redirect_uri' => url('fbcallback'),
		        'scope' => 'email',
	    	);
	    	return Redirect::to($facebook->getLoginUrl($params));
    	}

    	public function get_fbcallback()
    	{
    		$code = Input::get('code');
    		
    		if (strlen($code) == 0) 
    		{
    			return Redirect::to_route('home')->with('message','Erro ao comunicar com o facebook');
    		}

    		$facebook = new Facebook(Config::get('facebook'));
    		$uid = $facebook->getUser();

    		if($uid == 0)
    		{
    			return Redirect::to_route('home')->with('message','Erro facebook');
    		}

    		$me = $facebook->api('/me');

    		$profile = Usernetwork::where('Uid','=',$uid)->first();

    		if (empty($profile)) {

    			$user = new User;
    			$user->name = $me['first_name'].' '.$me['last_name'];
    			$user->email = $me['email'];
    			$user->password = Hash::make('123456');
    			$user->username = $me['username'];
    			$user->photo = 'https://graph.facebook.com/'.$me['username'].'/picture?type=large';
    			$user->save();

    			$profile = new Usernetwork();
    			$profile->uid = $uid;
    			$profile->access_token = $facebook->getAccessToken();
    			$profile = $user->usernetwork()->save($profile);
    		}

    		$user = $profile->user_id;
    		Auth::login($user, true);
            return Redirect::to_route('home');
    	}
	}
?>