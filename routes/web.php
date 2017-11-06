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
    return redirect('home');
});
Route::get('/login',  'AuthController@Login')->name('login');
Route::post('/login',  'AuthController@postLogin')->name('login');
Route::group(['middleware'=>['LoginAuth']],function(){
  Route::post('/logout',  'AuthController@logout')->name('logout');
  Route::get('/home' ,    'HomeController@index') ->name('home');
  Route::get('/attendance' , 'AttendanceController@create') ->name('attendance');
  Route::post('/attendance' , 'AttendanceController@store') ->name('attendance');
  Route::get('/archives' ,    'AttendanceController@index') ->name('archive');
  Route::post('/archives' ,    'AttendanceController@postIndex') ->name('archive');
  Route::get('/archives/{id}' ,    'AttendanceController@show') ->name('archive');
  Route::get('/archives/{id}/edit' ,    'AttendanceController@edit') ->name('Update');
  Route::post('/archives/{id}/edit' ,    'AttendanceController@update') ->name('Update');
  Route::get('/archives/{id}/delete' ,    'AttendanceController@destroy') ->name('destroy');
  Route::get('/setting' ,    'HomeController@index') ->name('setting');
  Route::group(['middleware'=>['Permission']],function(){
    Route::get('/admin' ,    'AdminController@index') ->name('admin');
  });
});
