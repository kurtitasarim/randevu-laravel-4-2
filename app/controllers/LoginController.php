<?php

class LoginController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        //
        //print_r(Sentry::check());
        if(!Sentry::check()) {
            return View::make('web.auth.login')->with('title', Lang::get('pagination.login_title'));
        } else {
            return \Illuminate\Support\Facades\Redirect::to('/');
        }
    }

    /**
     * Post Login.
     *
     * @return Response
     */

    public function postIndex()
    {
        //echo "<pre>";
        //print_r(Input::all());exit;
        $Input		=	Input::except('_token', '_method');
        $validation	=	\Illuminate\Support\Facades\Validator::make($Input,array(
            'email'		    =>	'required|min:3',
            'password'		=>	'required|min:2|AlphaNum',
            'captcha'       =>  array('required', 'captcha')
        ));
        if($validation->fails())
        {
            return \Illuminate\Support\Facades\Redirect::back()->withErrors($validation);
        }
        $credentials = array(
            'email' 		=> Input::get('email'),
            'password' 		=> Input::get('password')
        );

        try
        {
            $user = Sentry::authenticate($credentials, true);

            if ($user)
            {
                //echo "geldi";exit;
                return Redirect::to('/');
            }
        } catch(\Exception $e)
        {
            return Redirect::back()->withErrors(array('login' => $e->getMessage()));
        }
    }
    /**
     * Aktivasyon
     *
     * @return Response
     */
    public function activateAccount($code)
    {
        try
        {
            $user = Sentry::findUserByActivationCode($code);
            try{
                if ($user->attemptActivation($code))
                {
                    return \Illuminate\Support\Facades\Redirect::to('/login')->with('message',Lang::get('pagination.activationSuccess'));
                } else {
                    return \Illuminate\Support\Facades\Redirect::to('/login')->with('message',Lang::get('pagination.activationError'));
                }
            } catch (Cartalyst\Sentry\Users\UserAlreadyActivatedException $e) {
                return \Illuminate\Support\Facades\Redirect::to('/login')->with('message',Lang::get('pagination.already-activated'));
            }
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            //echo 'User was not found.';
            return \Illuminate\Support\Facades\Redirect::to('/login')->with('message',Lang::get('pagination.noActivationCode'));
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function doLogout()
    {
        //
        Sentry::logout();
        return Redirect::to('/');
    }
    //
    public function getAdmin(){
        if(Sentry::check()){
            echo "oldu";
        } else {
            echo "olmadı";
        }
    }

}
