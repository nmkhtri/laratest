<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth:web' , 'CheckDeveloper'] ,'prefix' => 'developer'],function (){

    Route::get('/panel','Dev\DeveloperController@index');
});

Route::group(['middleware' => ['auth:web' , 'CheckOperator'],'prefix' => 'operator'],function (){

    Route::get('/panel','Oper\OperatorController@index');
});

//Route::group(['middleware' => ['auth:web' , 'CheckUser'],'prefix' => 'operator'],function (){
//
//    Route::get('/panel','User\UserController@index');
//});








//Auth::routes();

Route::group(['namespace' => 'Auth'],function(){
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

});

Route::get('/home', 'HomeController@index')->name('home');
