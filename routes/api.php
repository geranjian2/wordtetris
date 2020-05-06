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

Route::get('/tetris/draw/t',['uses'=> 'v1\WordT@draw']);
Route::post('/tetris/rotate/t',['uses'=> 'v1\WordT@rotate']);
Route::post('/tetris/move/t',['uses'=> 'v1\WordT@move']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
