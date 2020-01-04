<?php

class AdminSettingsController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('hasAccess:settings');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $settings   =  Settings::first();
        //print_r($settings);exit;
        return \Illuminate\Support\Facades\Redirect::to('admin/settings/'.$settings->id.'/edit');
        //make('admin.settings.edit')->with('title',Lang::get('pagination.settings_configuration'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return View::make('admin.settings.create')->with('title',Lang::get('pagination.settings_create'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        try
        {
            //echo "<pre>";
            $Input		=	Input::except('_token', '_method');
            //echo json_encode($Input);
            if (Request::isMethod('post'))
            {
                $settings   =   new Settings();
                if($settings->truncate())
                {
                    $settings->data =   json_encode($Input);
                    if($settings->save())
                    {
                        return \Illuminate\Support\Facades\Redirect::to('/admin/settings');
                    } else {
                        echo "error";
                    }
                }
            }
            //echo Response::json($Input);
        } catch(\Nette\Neon\Exception $e)
        {
            echo "<pre>";
            echo $e;
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
		//
        $settings   =   Settings::find($id);
        if($settings)
        {
            $settings   =   json_decode($settings->data);
            //echo "<pre>";
            //print_r($settings);exit;
            return View::make('admin.settings.edit',array('settings'=>$settings,'settings_id'=>$id));
        } else {
            return \Illuminate\Support\Facades\Redirect::to('/admin');
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
        try
        {
            //echo "<pre>";
            $Input		=	Input::except('_token', '_method');
            //echo json_encode($Input);
            if (Request::isMethod('put'))
            {
                $settings   =   new Settings();
                if($settings->truncate())
                {
                    $settings->data =   json_encode($Input);
                    if($settings->save())
                    {
                        return \Illuminate\Support\Facades\Redirect::to('/admin/settings');
                    } else {
                        echo "error";
                    }
                }
            }
            //echo Response::json($Input);
        } catch(\Nette\Neon\Exception $e)
        {
            echo "<pre>";
            echo $e;
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
		//
	}


}
