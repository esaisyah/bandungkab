<?php

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
Route::auth();
Route::get('/', function () {
	$agendas = \App\Agenda::where('tanggal', '>', \Carbon\Carbon::now())
        ->orderBy('tanggal', 'asc')->get();
    $latestArticles = \App\Article::orderBy('created_at', 'desc')->take(4)->get();

    return view('frontend.home', compact('agendas', 'latestArticles'));
});

// Harus udah login
Route::group(['middleware' => 'authenticated'], function() {
    //backend
    Route::get('admin', function(){return view('backend.dashboard');});
    Route::resource('admin/units', 'Backend\\UnitsController');
    Route::resource('admin/profiles', 'Backend\\ProfilesController');
    Route::resource('admin/pages', 'Backend\\PagesController');
    Route::resource('admin/agendas', 'Backend\\AgendasController');
    Route::resource('admin/articles', 'Backend\\ArticlesController');
    Route::resource('admin/districts', 'Backend\\DistrictsController');
    Route::resource('admin/complaints', 'Backend\\ComplaintsController');
    Route::resource('admin/places', 'Backend\\PlacesController');
    Route::resource('admin/budget-reports', 'Backend\\BudgetReportsController');
    Route::resource('admin/menu-items', 'Backend\\MenuItemsController');
});


//frontend
Route::get('skpd', 'Frontend\\UnitsController@index');
Route::get('pemimpin-daerah/{profile}', 'Frontend\\ProfilesController@show');
Route::get('pages/{id}', 'Frontend\\PagesController@show');
Route::get('agenda/{id}', 'Frontend\\AgendasController@show');
Route::get('artikel/{id}', 'Frontend\\ArticlesController@show');
Route::get('artikel', 'Frontend\\ArticlesController@index');
Route::get('kecamatan', 'Frontend\\DistrictsController@index');
Route::get('kontak', 'Frontend\\PagesController@pageContact');
Route::get('keluhan', 'Frontend\\ComplaintsController@keluhan');
Route::post('komplain', 'Frontend\\ComplaintsController@store');
Route::get('agenda/{id}', 'Frontend\\AgendasController@show');
Route::get('agenda', 'Frontend\\AgendasController@index');
Route::get('wisata', 'Frontend\\PlacesController@index');
Route::get('wisata/{id}', 'Frontend\\PlacesController@show');
Route::get('apbd', 'Frontend\\BudgetReportsController@index');



