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
Auth::routes();
Route::middleware('auth')->group(function(){
    Route::post('/logout','App\Http\Controllers\Auth\LoginController@loggedOut');
    Route::get('/{any}', function(){
        return view('app');
    })->where('any', '.*');
});
Auth::routes();


