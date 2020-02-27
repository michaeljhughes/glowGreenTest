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

Route::get('developer-tests', 'DeveloperTestController@index');
Route::get('developer-tests/{id}', 'DeveloperTestController@get');
Route::post('developer-tests', 'DeveloperTestController@create');
Route::put('developer-tests/{id}', 'DeveloperTestController@update');
Route::delete('developer-tests/{id}', 'DeveloperTestController@delete');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
