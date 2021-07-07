<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Auth; 
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

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('admin/news', [HomeController::class, 'news'])->name('admin.news')->middleware('is_admin');
Route::get('admin/category', [HomeController::class, 'category'])->name('admin.category')->middleware('is_admin');


