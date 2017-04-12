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
    if (Auth::id()) {
        return Redirect::to('pages');
    } else {
        return Redirect::to('login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('pages/updateajax', 'PageController@updateajax');
Route::post('pages/updateajaximage', 'PageController@updateajaximage');
Route::post('pages/updateajaxfile', 'PageController@updateajaxfile');
Route::resource('pages', 'PageController');

Route::resource('leads', 'LeadController');
