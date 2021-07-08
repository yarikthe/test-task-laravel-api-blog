<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'home/admin'], function(){
    Route::get('/', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/news', [HomeController::class, 'news'])->name('admin.news');
    Route::get('/category', [HomeController::class, 'category'])->name('admin.category');

});



