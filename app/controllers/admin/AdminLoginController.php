<?php

class AdminLoginController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        //
        //print_r(Sentry::check());
        return View::make('admin.auth.login')->with('title',Lang::get('pagination.login_title'));
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
            'password'		=>	'required|min:2|AlphaNum'
        ));
        if($validation->fails())
        {
            return \Illuminate\Support\Facades\Redirect::to('/admin/login')->withErrors($validation);
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
                return Redirect::to('/admin');
            }
        } catch(\Exception $e)
        {
            return Redirect::to('/admin/login')->withErrors(array('login' => $e->getMessage()));
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
                    return \Illuminate\Support\Facades\Redirect::to('/admin/login')->with('message',Lang::get('pagination.activationSuccess'));
                } else {
                    return \Illuminate\Support\Facades\Redirect::to('/admin/login')->with('message',Lang::get('pagination.activationError'));
                }
            } catch (Cartalyst\Sentry\Users\UserAlreadyActivatedException $e) {
                return \Illuminate\Support\Facades\Redirect::to('/admin/login')->with('message',Lang::get('pagination.already-activated'));
            }
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            //echo 'User was not found.';
            return \Illuminate\Support\Facades\Redirect::to('/admin/login')->with('message',Lang::get('pagination.noActivationCode'));
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
        return Redirect::to('/admin/login');
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
