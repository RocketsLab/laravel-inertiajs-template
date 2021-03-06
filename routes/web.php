<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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

// Dashboard
Route::get('/', 'DashboardController')->name('dashboard')->middleware('auth');

/*
 * Auth
 */
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login')->middleware('guest');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register')->middleware('guest');
Route::post('login', 'Auth\LoginController@login')->name('login.attempt')->middleware('guest');
Route::post('logout')->name('logout')->uses('Auth\LoginController@logout');
Route::post('register', 'Auth\RegisterController@register')->name('register.create')->middleware('guest');

// 500 error
Route::get('500', function () {
    // Force debug mode for this endpoint in the demo environment
    if (App::environment('demo')) {
        Config::set('app.debug', true);
    }

    echo $fail;
});

//Alert demo
Route::get('alert-success', function (){
    session()->flash('success', 'Success message demo!');
    return Redirect::back();
});

Route::get('alert-error', function (){
    session()->flash('error', 'Alert message demo!');
    return Redirect::back();
});

Route::get('alert-warning', function (){
    session()->flash('warning', 'Warning message demo!');
    return Redirect::back();
});

Route::get('alert-info', function (){
    session()->flash('info', 'Info message demo!');
    return Redirect::back();
});

Route::post('alert-form', function (){
    return \Illuminate\Support\Facades\Request::validate([
        'field1' => 'required',
        'field2' => 'required',
    ]);
});
