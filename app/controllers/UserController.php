<?php


class UserController extends \BaseController {

    protected $user;
    /**
     * Instantiate a new UserController
     */
    public function __construct
    (
        User $user
    )
    {
        $this->beforeFilter('hasAccess:user');
        $this->user = $user;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $users = $this->user->all();
        return View::make('admin.users.index',array('user'=>$users))->with('title', Lang::get('pagination.users'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return \Illuminate\Support\Facades\View::make('admin.users.create',array())
            ->with('title',Lang::get('pagination.users').' '.Lang::get('pagination.add'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
    {
        if (Request::isMethod('post')) {
            $Input = Input::except('_token', '_method');
            $validator = \Illuminate\Support\Facades\Validator::make($Input, array(
                'first_name' => 'required|min:3|max:50|Alpha',
                'last_name' => 'required|min:2|Alpha',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|AlphaNum|Confirmed',
                'password_confirmation' => 'required|min:6|AlphaNum',
            ));
            if ($validator->fails()) {
                return \Illuminate\Support\Facades\Redirect::to('/admin/users/create')->withErrors($validator);
            }
            //kayıt işlemleri
            try {
                $user = Sentry::createUser(array(
                    'email' => $Input["email"],
                    'password' => $Input["password"],
                    'first_name' => $Input["first_name"],
                    'last_name' => $Input["last_name"],
                    'activated' => true,
                ));
                $activationCode = $user->getActivationCode();
            } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
                return print_r($e);
            }
            //Mail::send('emails.welcome', array('first_name'=>Input::get('first_name'),'activeCode'=>$activationCode), function($message){
            //	$message->to(Input::get('email'), Input::get('first_name').' '.Input::get('last_name'))->subject(Lang::get('pagination.welcome').' '.Config::get('app.ProjectName'));
            //});
            Return \Illuminate\Support\Facades\Redirect::to('/admin/users')->withInput()->with('message', Lang::get('pagination.registgerSucces'));
        }
    }


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $user   =   \Cartalyst\Sentry\Users\Eloquent\User::find($id);
        //echo "<pre>";
        //print_r($user->profile);exit;
        if($user->count()>0)
        {
            return View::make('admin.users.show',array('users'=>$user))
                ->with('title',Lang::get('pagination.users').' '.Lang::get('pagination.show'));
        } else {
            return \Illuminate\Support\Facades\Redirect::to('/users');
        }
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
        $user   =   \Cartalyst\Sentry\Users\Eloquent\User::find($id);
        //echo "<pre>";
        //print_r($user->profile);exit;
        if($user->count()>0)
        {
            return View::make('admin.users.edit',array('users'=>$user))
                ->with('title',Lang::get('pagination.users').' '.Lang::get('pagination.edit'));
        } else {
            return \Illuminate\Support\Facades\Redirect::to('/users');
        }
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
        if (Request::isMethod('PUT')) {
            $Input = Input::except('_token', '_method');
            //print_r($Input);
            //exit;
            $user = Sentry::findUserById($id);
            if($Input['islem']=='bilgileriGuncelle')
            {
                //kayıt işlemleri
                try {
                    $user->activated    = $Input['users_activated'];
                    if($user->save())
                    {
                        $profile    =   Profile::find($user->profile[0]->id);
                        //echo $tip;exit;
                        $profile->users_types   =   $Input['users_types'];
                        $profile->save();
                        Return \Illuminate\Support\Facades\Redirect::to('/admin/users')->withInput()->with('message', Lang::get('pagination.success'));
                    }
                } catch (Cartalyst\Sentry\Users\UserExistsException $e)
                {
                    echo 'User with this login already exists.';
                }
                catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
                {
                    echo 'User was not found.';
                }
                //Mail::send('emails.welcome', array('first_name'=>Input::get('first_name'),'activeCode'=>$activationCode), function($message){
                //	$message->to(Input::get('email'), Input::get('first_name').' '.Input::get('last_name'))->subject(Lang::get('pagination.welcome').' '.Config::get('app.ProjectName'));
                //});
            }

            if($Input['islem']=='sifreGuncelle')
            {
                $validator = \Illuminate\Support\Facades\Validator::make($Input, array(
                    'password'              => 'required|min:6|AlphaNum|Confirmed',
                    'password_confirmation' => 'required|min:6|AlphaNum',
                ));
                if ($validator->fails()) {
                    return \Illuminate\Support\Facades\Redirect::to('/admin/users/'.$id.'/edit')->withErrors($validator);
                }
                //kayıt işlemleri
                try {
                    $user->password     = $Input["password"];
                    if($user->save())
                    {
                        Return \Illuminate\Support\Facades\Redirect::to('/admin/users')->withInput()->with('message', Lang::get('pagination.success'));
                    }
                } catch (Cartalyst\Sentry\Users\UserExistsException $e)
                {
                    echo 'User with this login already exists.';
                }
                catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
                {
                    echo 'User was not found.';
                }
                //Mail::send('emails.welcome', array('first_name'=>Input::get('first_name'),'activeCode'=>$activationCode), function($message){
                //	$message->to(Input::get('email'), Input::get('first_name').' '.Input::get('last_name'))->subject(Lang::get('pagination.welcome').' '.Config::get('app.ProjectName'));
                //});
            }
            if($Input['islem']=='resmiGuncelle')
            {
                //$profile    =   $user->profile;
                //echo "<pre>";
                //print_r($profile);exit;
                ########Resim############
                if (Input::hasFile('defaultImage')) {
                    if($user->image)
                    {
                        if(!unlink(public_path().'/web/upload/users_image/'.$user->image))
                        {
                            echo "Resmi Silemedi";exit;
                        }
                    }
                    $file = Input::file('defaultImage');
                    #### Extencion ####
                    $mime       =   $file->getClientmimeType();
                    if ($mime == 'image/jpeg')
                        $extension = '.jpg';
                    elseif ($mime == 'image/png')
                        $extension = '.png';
                    elseif ($mime == 'image/gif')
                        $extension = '.gif';
                    else
                        $extension = '';
                    #### Extencion End ####
                    //echo "<pre>";
                    $newName = str_random(10) . date('mdY_his_u');
                    $file->move(public_path().'/web/upload/users_image/', $newName.$extension);
                    $image = Image::make(sprintf('web/upload/users_image/%s', $newName.$extension))
                        ->fit(250, 200)
                        ->save(sprintf('web/upload/users_image/%s', $newName.$extension));
                    try
                    {
                        $user->image      =   $newName.$extension;
                        if($user->save())
                        {
                            return \Illuminate\Support\Facades\Redirect::back();
                        }
                    } catch (\Nette\Neon\Exception $e)
                    {
                        echo $e;
                    }
                }
                ########Resim Son############
            }
        }

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        //echo "geldi";exit;
        $users = User::find($id);
        if($users->delete())
        {
            return \Illuminate\Support\Facades\Redirect::to('/admin/users');
        }
	}


}
