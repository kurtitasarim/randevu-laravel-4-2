<?php

class AdminBranchController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('hasAccess:branch');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $branch     =   Branch::all();

        return View::make('admin.branch.index',array('branch'=>$branch))
            ->with('title',Lang::get('pagination.branch').' '.Lang::get('pagination.list'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.branch.create')->with('title',Lang::get('pagination.create'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        if (Request::isMethod('post'))
        {
            ########Sabitler#########
            $Input		=	Input::except('_token', '_method');
            //echo "<pre>";
        	//print_r($Input);
        	//exit;
            $validator	=	\Illuminate\Support\Facades\Validator::make($Input,array(
                'name'				=>	'required|min:3|max:50',
                'phone'			    =>	'min:2|max:150',
            ));
            ########Sabitler Son#####
            if($validator->fails())
            {
                return \Illuminate\Support\Facades\Redirect::back()->withErrors($validator);
            }
            //kayıt işlemleri
            try {
                $branch =   new Branch();

                $branch->user_id=	Sentry::getUser()->id;
                $branch->name   =   $Input['name'];
                $branch->phone  =   $Input['phone'];
                if(!empty($Input['address']))
                {
                    $branch->address    =   $Input['address'];
                }
                $branch->active =   $Input['active'];
                if($branch->save())
                {
                    return \Illuminate\Support\Facades\Redirect::to('/admin/branch');
                }
            } catch ( Exception $e ) {
                echo "<pre>";
                print_r($e->getMessage());
            }
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
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$branch =   Branch::find($id);
        if($branch->count()>0)
        {
            return View::make('admin.branch.edit',array('branch'=>$branch))->with('title',Lang::get('pagination.edit'));
        } else {
            return \Illuminate\Support\Facades\Redirect::back();
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
        if (Request::isMethod('put'))
        {
            ########Sabitler#########
            $Input		=	Input::except('_token', '_method');
            //echo "<pre>";
            //print_r($Input);
            //exit;
            $validator	=	\Illuminate\Support\Facades\Validator::make($Input,array(
                'name'				=>	'required|min:3|max:50',
                'phone'			    =>	'min:2|max:150',
            ));
            ########Sabitler Son#####
            if($validator->fails())
            {
                return \Illuminate\Support\Facades\Redirect::back()->withErrors($validator);
            }
            //kayıt işlemleri
            try {
                $branch =   Branch::find($id);

                $branch->user_id=	Sentry::getUser()->id;
                $branch->name   =   $Input['name'];
                $branch->phone  =   $Input['phone'];
                if(!empty($Input['address']))
                {
                    $branch->address    =   $Input['address'];
                }
                $branch->active =   $Input['active'];
                if($branch->save())
                {
                    return \Illuminate\Support\Facades\Redirect::to('/admin/branch');
                }
            } catch ( Exception $e ) {
                echo "<pre>";
                print_r($e->getMessage());
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
		$users = Branch::find($id);
        if($users->delete())
        {
            return \Illuminate\Support\Facades\Redirect::to('/admin/branch');
        }
	}

}
