<?php

use App\Http\Controllers\Api\user_controller;
use App\Http\Controllers\menu_controller;
use App\Models\Role;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register',[user_controller::class,'register']);
Route::post('login',[user_controller::class,'login']);

Route::group(['middleware'=>['auth:sanctum']],function(){

        Route::get('menus',[user_controller::class,'menus']);



        Route::get('logout',[user_controller::class,'logout']);
});
