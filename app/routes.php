<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|

*/
Route::get('/', 'HomeController@index');
Route::post('api/randevuDetails', array('before' => 'csrf', function()
{
    if (Request::isMethod('post')) {
        $randevu = Randevu::where('number_of_appointments', '=', Input::get('number'))->first();
        if(count($randevu)>0) {
            return Response::json(array('success' => true,'name'=>$randevu->name_surname,'phone'=>$randevu->phone,'start'=>$randevu->start_date,'end'=>$randevu->end_date), 200);
        } else {
            return Response::json(array('success' => false), 200);
        }
    }
}));
Route::controller('/admin/login','AdminLoginController');
Route::get('/logout', array('uses' => 'LoginController@doLogout'));
Route::group(array('prefix' => 'admin','before'=>'adminAuth|Sentry|inGroup:Admin;Managers'), function() {
    Route::resource('/','AdminHomeController');
    Route::resource('/users','UserController');
    Route::resource('/settings','AdminSettingsController');
    Route::resource('/branch','AdminBranchController');
    Route::resource('/appointment','AdminRandevuController');
    Route::get('api/randevuList','AdminRandevuController@randevuList');
    Route::post('api/randevuInsert','AdminRandevuController@randevuInsert');
    Route::post('api/randevuDelete','AdminRandevuController@randevuDelete');
    Route::post('api/randevuDateUpdate','AdminRandevuController@randevuDateUpdate');
    Route::post('api/randevuUpdate','AdminRandevuController@randevuUpdate');
    Route::post('api/randevuDetails','AdminRandevuController@randevuDetails');
});