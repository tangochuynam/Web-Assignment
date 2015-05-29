<?php
use App\User;
use App\image;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// -- This is test for beginner learn Laravel --
// Route:: get('/array',['name' => 'get.array','uses'=>'HomeController@showWelcome']);
// Route::get('/string','HomeController@showWelcome');
// Route::controller('/controller','HomeController',['getFirst'=>'first','getSecond'=>'second','postThird'=>'third']);

// Route::match(['GET','POST'],'/news','DemoController');

// Route::controller('/views','Subfolder\Subtest');
// Route::controller('/search','Subfolder\Subtest',['']);
// // end test 

// // Default of Laravel 
// Route::get('/', 'WelcomeController@index');
// Route::get('home', 'HomeController@index');
// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);
// end Default of Laravel 

// Real for Assignmenet 
Route::controller('/','ViewController');
Route::post('user/login','ViewController@do_login');
Route::group(array("prefix"=>"check"),function(){
	Route::post("check-username",function(){
		if(User::check_username(Input::get("username")))
			return "true";
		else return "false";
	});
	Route::post("check-email",function(){
		if(User::check_email(Input::get("email")))
			return "true";
		else return "false";
	});
});

Route::filter("check-logined", function(){
	if (!Session::has("logined"))
		return Redirect::to("login");
});

// Route::get('mainlayout', 'ViewController@Mainlayout');

// Route::get('mainlayout-test', 'ViewController@MainlayoutTest');


