<?php

class RegisterController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        //
        //return "test";exit;
        return View::make('web.auth.register')->with('title',Lang::get('pagination.register'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postIndex()
    {
        $Input		=	Input::except('_token', '_method');
        $validator	=	\Illuminate\Support\Facades\Validator::make($Input,array(
            'first_name'				=>	'required|min:3|max:50|Alpha',
            'last_name'					=>	'required|min:2|Alpha',
            'phone'					    =>	'required|min:10|Numeric',
            'email'						=>	'required|email|unique:users',
            'password'					=>	'required|min:4|AlphaNum|Confirmed',
            'password_confirmation'		=>	'required|min:4|AlphaNum',
            'captcha'                   =>  array('required', 'captcha')
        ));
        if($validator->fails())
        {
            return \Illuminate\Support\Facades\Redirect::to('/register')->withErrors($validator);
        }
        //kayıt işlemleri
        try{
            $user = Sentry::register(array(
                'first_name'	=>	$Input["first_name"],
                'last_name'		=>	$Input["last_name"],
                'email'			=>	$Input["email"],
                'phone'			=>	$Input["phone"],
                'password'		=>	$Input["password"],
                'activated'		=>	false,
            ));
            $activationCode = $user->getActivationCode();
            if($user || true)
            {
                Mail::send('emails.welcome', array('first_name'=>Input::get('first_name'),'activeCode'=>$activationCode), function($message){
                	$message->to(Input::get('email'), Input::get('first_name').' '.Input::get('last_name'))->subject(Lang::get('pagination.welcome'));
                });
            }
            Return \Illuminate\Support\Facades\Redirect::to('/register')->withInput()->with('message',Lang::get('pagination.registgerSucces').' '.Lang::get('pagination.send_email_active'));
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            return print_r($e);
        }

    }

}
