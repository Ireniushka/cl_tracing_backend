<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'API\Auth\AuthController@login');



Route::middleware('auth:api')->group( function () { 
    Route::resource('users', 'API\UserController');
    Route::resource('pupils', 'API\PupilController');
    Route::resource('relations', 'API\RelationController');
    Route::resource('activities', 'API\ActivityController');
    Route::resource('tracking_acts', 'API\TrackingActivityController');
    Route::resource('tracking_tests', 'API\TrackingTestController');
});

