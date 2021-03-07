<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
/*
Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::post('/login', 'Auth\ApiAuthController@login')->name('login.api');
    Route::post('/register','Auth\ApiAuthController@register')->name('register.api');

});

Route::post('register', 'App\Http\Controllers\RegisterController@register');
*/
Route::middleware('auth:api')->group(function () {
    //Route::post('/logout', 'App\Http\Controllers\API\AuthController@logout')->name('api.logout');
    Route::get('users', 'App\Http\Controllers\API\UserController@index')->name('api.users');
    Route::get('users/{user}', 'App\Http\Controllers\API\UserController@show');
    Route::post('users', 'App\Http\Controllers\API\UserController@store')->name('api.users');
    Route::put('users/{user}', 'App\Http\Controllers\API\UserController@update');
    Route::delete('users/{user}', 'App\Http\Controllers\API\UserController@destroy')->name('api.users');
});

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('register', [AuthController::class, 'register'])->name('api.register');
Route::post('login', [AuthController::class, 'login'])->name('api.login');

//Route::apiResource('users', UserController::class)->middleware('auth:api');
