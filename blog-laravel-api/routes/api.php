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

Route::group(['prefix'=>'v1'], function(){

    // START - CATEGORY //

    //Вывести список всех категорий (GET метод)
    Route::get('/categories',[CategoryController::class,'index']);
    //Получить одну категорию по ID и все ее новости (GET метод)
    Route::get('/categories/{id}',[CategoryController::class,'index']);
    //Возможность добавить новую категорию (POST метод)
    Route::post('/category',[CategoryController::class,'store']);
    //Возможность удаления категории (DELETE метод)
    Route::delete('/category/{id}',[CategoryController::class,'destroy']);

    // END - CATEGORY //


    // START - NEWS //

    //Вывести список всех новостей (GET метод)
    Route::get('/news',[NewsController::class,'index']);
    //Возможность добавить новую новость (POST метод)
    Route::post('/news',[NewsController::class,'store']);

    // END - NEWS //
});

//Вывести список всех категорий (GET метод)
//Вывести список всех новостей (GET метод)
//Получить одну категорию по ID и все ее новости (GET метод)
//Возможность добавить новую категорию (POST метод)
//Возможность добавить новую новость (POST метод)
//Возможность удаления категории (DELETE метод)
