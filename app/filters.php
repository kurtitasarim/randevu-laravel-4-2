<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/


App::after(function($request, $response)
{
    //
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/
Route::filter('auth', function()
{
    if (!Sentry::check()) {
        return Redirect::to('/login');
    }
});
Route::filter('adminAuth', function()
{
    if (!Sentry::check()) {
        return Redirect::to('/admin/login');
    }
});

Route::filter('hasAccess', function($route, $request, $value)
{
    try
    {
        $user = Sentry::getUser();

        if(!$user->hasAnyAccess(['system']) && !$user->hasAccess($value))
        {
            return Redirect::to('/admin')->withErrors(array(Lang::get('user.noaccess')));
        }
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
    {
        return Redirect::to('/')->withErrors(array(Lang::get('user.notfound')));
    }

});

Route::filter('inGroup', function($route, $request, $value) {
    try {
        //echo "<pre>";
        //print_r($value);exit;
        $values = explode(';', $value);
        $user = Sentry::getUser();
        $status = false;
        foreach ($values as $val) {
            $group = Sentry::findGroupByName($val);
            //print_r($group);exit;
            if ($user->inGroup($group)) {
                $status = true;
            }
        }
        if ($status == false) {
            return Redirect::to('/')->with('error', 'You have no access to this resource!');
        }
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
    {
        //echo "user not found";exit;
        return Redirect::to('/')->withErrors(array(Lang::get('user.notfound')));
    }

    catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
    {
        //echo "user not group found";exit;
        return Redirect::to('/')->withErrors(array(Lang::get('group.notfound')));
    }
});

Route::filter('auth.basic', function()
{
    return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/


Route::filter('guest', function()
{
    if (Auth::check()) return Redirect::to('/');
});


/*
App::before(function ($request) {
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
});*/
/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/
Route::filter('csrf', function()
{
    if (Request::ajax())
    {
        //echo "geldi";Exit;
        if (Session::token() !== Request::header('csrftoken') && Session::token() !== Input::get('_token'))
        {
            // Change this to return something your JavaScript can read...
            throw new Illuminate\Session\TokenMismatchException;
        }
    }
    elseif (Session::token() !== Input::get('_token'))
    {
        throw new Illuminate\Session\TokenMismatchException;
    }
});

Route::filter('Security', function($route,$request)
{
    //echo "<pre>";
    //echo $route->getParameter('id');
    //echo "<br/>";
    //echo Request::segment(1);
    //print_r($request);exit;
    //print_r($request);
    /**/
    if(Request::segment(1)=="Sayfa" || Request::segment(1)=="Haber" || Request::segment(1)=="Kurullar") {
        $control = Page::find($route->getParameter('id'));
    }
    if(Request::segment(1)=="Etkinlikler") {
        $control = Activity::find($route->getParameter('id'));
    }
    //echo $control->security;exit;
    if($control->security)
    {
        if(!Sentry::check()) {
            return View::make('sayfa.page.erisimyok')->with('title','Erişiminiz Engellendi!');
        }
    }
    /**/
});
