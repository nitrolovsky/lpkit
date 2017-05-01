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
    $domain = Request::server("HTTP_HOST");
    $page = App\Page::where('domain', $domain)->first();
    if ($page) {
        return view('pages.show')
            ->with('page', $page);
    }

    $env = explode(".", Request::server("HTTP_HOST"));
    $subdomain = array_shift($env);
    $page = App\Page::where('subdomain', $subdomain)->first();
    if ($page) {
        return view('pages.show')
            ->with('page', $page);
    }

    if (Auth::id()) {
        return Redirect::to('pages');
    } else {
        return Redirect::to('login');
    }
});

Auth::routes();

Route::get('users/logout', function() {
    Auth::logout();
    return redirect('/login');
});
Route::get('/home', 'HomeController@index');

Route::get('pages/thanks', 'PageController@thanks');
Route::post('pages/updateajax', 'PageController@updateajax');
Route::post('pages/updateajaximage', 'PageController@updateajaximage');
Route::post('pages/updateajaxfile', 'PageController@updateajaxfile');
Route::resource('pages', 'PageController');

Route::post('leads/updatestatus', 'LeadController@updatestatus');
Route::resource('leads', 'LeadController');
