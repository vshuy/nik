<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', [HomeController::class, 'returnViewHome'])->name('home');
Route::get('/uploadslidepage', function () {
    return view('uploadslide');
})->middleware('auth')->name('uploadslidepage');


Route::post('/uploadcategory', [CategoryController::class, 'addAcategory'])->name('UploadCategoryRequest');
// Route::get('/login', [UserController::class, 'showViewLogin'])->name('login');
Route::post('/loginrequest', [UserController::class, 'handleLogin'])->name('loginrequest');
Route::get('/logoutrequest', [UserController::class, 'handleLogout'])->name('logout');
Route::get('/setsession', [SessionController::class, 'setSession']);
Route::get('/getsession', [SessionController::class, 'getSession']);
Route::get('/dashboard', [DashboardController::class, 'loadPage'])->name('dashboard')->middleware('auth');

Route::post('/uploadsliderequest', [SlideController::class, 'addASlide'])->name('UploadSlideRequest');
Route::get('/deleteaslide/{id}', [SlideController::class, 'removeASlide'])->middleware('auth');

Route::get('/deleteacake/{id}', [ProductController::class, 'deleteAProductById'])->middleware('auth');
Route::get('/uploadcakepage', [ProductController::class, 'getListCategoryCake'])->middleware('auth')->name('uploadcakepage');
Route::post('/uploadcakerequest', [ProductController::class, 'addAProduct'])->name('UploadCakeRequest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
