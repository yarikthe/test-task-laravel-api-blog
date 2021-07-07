<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\NewsController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

    // START - AUTH //
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    // END - AUTH //

    // START - CATEGORY //
    Route::get('/categories',[CategoryController::class,'index']);
    Route::get('/categories/{id}',[CategoryController::class,'find']);
    // END - CATEGORY //

    // START - NEWS //
    Route::get('/news',[NewsController::class,'index']);
    // END - NEWS //


Route::group(['middleware' => ['auth:sanctum']], function(){

    // START - PROFILE // 
    Route::post('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
    // END - PROFILE // 

    // START - CATEGORY //
    Route::post('/categories',[CategoryController::class,'store']);
    Route::delete('/categories/{id}',[CategoryController::class,'destroy']);
    // END - CATEGORY //

    // START - NEWS //
    Route::post('/news',[NewsController::class,'store']);
    // END - NEWS //
});
