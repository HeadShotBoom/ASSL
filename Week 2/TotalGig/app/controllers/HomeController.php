<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    public function register(){
        return View::make('register');
    }

    public function handleRegister(){


        $data = Input::all();
        $rules = array(
            'username' => 'alpha_num|min:3|required',
            'password' => 'min:3|required',
            'email' => 'email|required'
        );

        $validator = Validator::make($data, $rules);

        if($validator->passes()){
            $user = new User;
            $user->email = Input::get('email');
            $user->username = Input::get('username');
            $user->password = Hash::make(Input::get('password'));
            $user->save();

            Mail::send('users.mails.welcome', array('username'=>Input::get('username')), function($message){
                $message->to(Input::get('email'), Input::get('username'))->subject('Email System Test');
            });

            $theEmail = Input::get('email');
            return View::make('thanks')->with('theEmail', $theEmail);
        }

        return Redirect::to('/register')->withErrors($validator);

    }

    public function login(){
        return View::make('login');
    }

    public function handleLogin(){
        $credentials = Input::only('username', 'password');
        if(Auth::attempt($credentials)){
            return Redirect::intended('/');
        }
        return Redirect::to('login');
    }

    public function logout(){
        Auth::logout();
        return View::make('logout');
    }

    public function calendar(){
        $gig = Gig::all();
        return View::make('calendar', compact('gig'));
    }

}
