<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TeacherController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('login',[UserController::class,'loginUser']);



Route::group(['middleware' => 'auth:sanctum'],function(){

    Route::post('add-suggestion',[TeacherController::class,'add_suggestion']);
    Route::get('suggestion-delete/{id}',[TeacherController::class,'delete_suggestion']);
    Route::get('user',[UserController::class,'userDetails']);
    Route::get('logout',[UserController::class,'logout']);

});