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

// Route::get('/view', function () {
//     return view('store.view');
// });

Route::group(['middleware' => ['web']], function () {
    
    Route::get('/','StoreController@index');
    
    //Route::controller('store','StoreController');
    Route::get('/store/view/{title}', 'StoreController@getView');
    Route::get('/store/category/{id}', 'StoreController@getCategory');
    Route::get('/store/search' ,'StoreController@getSearch');

    Route::resource('category','CategoryController')->middleware('admin');
    Route::resource('post','PostController')->middleware('admin');
    Route::resource('user','UserController')->middleware('admin');

});

Route::group(['middleware' => ['web']], function () {
    Auth::routes(['verify' => true]);
    Route::get('/home', 'HomeController@index')
            ->name('home')
            ->middleware('verified');
});
