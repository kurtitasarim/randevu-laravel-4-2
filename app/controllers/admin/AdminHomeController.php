<?php
/**
 * User: kurtuluş öz
 * Email: kurtulus.oz@gmail.com
 * Web: www.kurtulusoz.com.tr
 * Date: 01.08.2015
 * Time: 11:50
 */

class AdminHomeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $branch                     =   json_decode(Branch::all());
        $settingsJson               =   Settings::find(1);
        $settings                   =   json_decode($settingsJson->data);
        $user                       =   User::all();
        $randevuCount               =   Randevu::count();
        $randevuCompletionCount     =   Randevu::where('completion',true)->count();
        //echo "<pre>";
        //print_r($settings);exit;

		return View::make('admin.home.index',
            array(
                    'branch'                    =>  $branch,
                    'settings'                  =>  $settings,
                    'user'                      =>  $user,
                    'randevuCount'              =>  $randevuCount,
                    'randevuCompletionCount'    =>  $randevuCompletionCount));
	}
}
