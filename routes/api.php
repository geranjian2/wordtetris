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

Route::get('/',['uses'=> 'v1\WordT@WordT']);
Route::post('/rotate',['uses'=> 'v1\WordT@rotate']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
