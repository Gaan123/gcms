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

Auth::routes();

Route::group(['prefix' => 'g-admin','middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('admin');
    Route::group(['prefix' => 'rep','namespace' => 'Backend'], function () {
        Route::resource('/post', PostController::class);
        //Media
        Route::post('/media/upload', 'MediaController@uploads')->name('media.upload');
        Route::get('/medias', 'MediaController@allMedias')->name('media.all');
        Route::delete('/medias/{media}', 'MediaController@delete')->name('media.delete');
    });
});
