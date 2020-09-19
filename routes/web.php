<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>['auth','admin']],function(){
    Route::get('admin/dashboard','AdminController@getAllQueries')->name('admin.dashboard');
    Route::get('home', 'AdminController@index')->name('home');
    Route::get('admin/dashboard/responseform/{id}','AdminController@responseFormView');
    Route::get('admin/delete-response/{id}','AdminController@deleteAResponse');
    Route::post('admin/submit-response/{id}','AdminController@createResponse')->name('create-response');
});


Route::group(['middleware'=>['auth','user']],function(){
    Route::get('user/dashboard','UserController@getAllQueries')->name('user.dashboard');
    Route::get('home', 'UserController@index')->name('home');
    Route::get('user/dashboard/queryform','UserController@queryFormView');
    Route::get('user/delete-query/{id}','UserController@deleteAQuery');
    Route::post('user/submit-query','UserController@createQuery')->name('create-query');
});