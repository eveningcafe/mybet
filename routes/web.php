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

Route::get('/',function () {
    return redirect('/footballNow');
});

Route::get('/footballNow/{matchId?}', 'GuessController@show')->name('footballNow');
Route::post('/footballNow/{matchId?}', 'LoginController@check')->name('login');
Route::get('/allfootball/{matchId?}', 'GuessController@showAllFB');
Route::get('/register', 'RegisterController@show');
Route::post('/register','RegisterController@check');

Route::get('/admin','AdminController@show')->name('admin');
Route::get('/admin/home','AdminController@showHome')->name('admin');
Route::get('/admin/management','AdminController@showManagement');
Route::get('/admin/management/{matchId}','AdminController@showManagementOneMatch');
Route::get('/admin/management/{matchId}/edit','AdminController@showMatchEdit');
Route::post('/admin/management/{matchId}/edit','AdminController@checkMatchEdit');
Route::get('/admin/management/{matchId}/seeBetUser','AdminController@seeBetUserInMatch');
Route::get('/admin/management/{matchId}/upresult','AdminController@showUpResult');
Route::post('/admin/management/{matchId}/upresult','AdminController@checkUpResult');
Route::get('/admin/addMatch','AdminController@showFormaddMatch');
Route::post('/admin/addMatch','AdminController@checkAddMatch');
Route::get('/admin/public/{matchId}','AdminController@publicMatch');
Route::get('/admin/delete/{matchId}','AdminController@deleteMatch');

// Route::get('/{user_name}/home', 'UserController@showHome')->name('user')->middleware('checklog');
Route::get('/{user_name}/home', 'UserController@showHome')->name('user');
Route::get('/{user_name}/allfootball/{matchId?}', 'UserController@showAllFB');
Route::get('/{user_name}/footballNow/{matchId?}', 'UserController@showFootballNow');
Route::get('/{user_name}/footballNow/{matchId}/seemore', 'UserController@showMatchDetail');
Route::post('/{user_name}/footballNow/{matchId}/seemore', 'UserController@checkBet');
Route::get('/{user_name}/delete/{matchName}', 'UserController@deleteBet');