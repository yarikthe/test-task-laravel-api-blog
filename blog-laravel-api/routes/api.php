<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\NewsController;
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
Route::group(['prefix'=>'v1'], function (){
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
});

Route::group(['prefix'=>'v1', 'middleware' => ['auth:sanctum']], function(){

    Route::post('/me', [AuthController::class, 'me']);

    // START - CATEGORY //
    Route::post('/category',[CategoryController::class,'store']);
    Route::delete('/category/{id}',[CategoryController::class,'destroy']);
    // END - CATEGORY //

    // START - NEWS //
    Route::post('/news',[NewsController::class,'store']);
    // END - NEWS //
});
