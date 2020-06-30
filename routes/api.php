<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('auth/login', 'AuthController@authenticate');
Route::post('auth/create', 'AuthController@AuthCreateUser');
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::resource('space/schedule', 'SchedulesController');
});
Route::get('/', function () {
    return response()->json(['message' => 'API CREATE OF THE BRENO MIRANDA', 'status' => 'Connected']);;
});