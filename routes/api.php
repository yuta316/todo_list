<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


// Route::middleware('auth:api')->group(function(){
    Route::get('/user', function(){ 
        return auth()->user();
    });
    Route::get('/users', 'UserController@index');


    Route::get('/tasks', 'TaskController@index');
    Route::post('/tasks', 'TaskController@store');
    Route::get('/tasks/{task}', 'TaskController@show');
    Route::put('/tasks/{task}', 'TaskController@update');
    Route::delete('/task/{task}', 'TaskController@destroy');

// });
