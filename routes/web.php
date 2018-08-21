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

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes...
Route::get('login', [
  'as' => 'login',
  'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
  'as' => '',
  'uses' => 'Auth\LoginController@login'
]);
Route::post('logout', [
  'as' => 'logout',
  'uses' => 'Auth\LoginController@logout'
]);

// Password Reset Routes...
Route::post('password/email', [
  'as' => 'password.email',
  'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
  'as' => 'password.request',
  'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
  'as' => '',
  'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
  'as' => 'password.reset',
  'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

// Registration Routes...
Route::get('register', [
  'as' => 'register',
  'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('register', [
  'as' => '',
  'uses' => 'Auth\RegisterController@register'
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'registration'], function()
{
    Route::get('/step1', 'Auth\RegisterController@step1')->name('step_1');
    Route::post('/step1', 'Auth\RegisterController@postStep1')->name('step_1');
    Route::get('/step2/{id}', 'Auth\RegisterController@step2')->name('step_2');
    Route::post('/step2/{id}', 'Auth\RegisterController@postStep2')->name('step_2');
    Route::get('/step3/{id}', 'Auth\RegisterController@step3')->name('step_3');
    Route::post('/step3/{id}', 'Auth\RegisterController@postStep3')->name('step_3');
});
