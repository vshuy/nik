<?php

use App\Product;
use App\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;

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
Route::post('test', function () {
    return ["result" => "data has been save"];
});
Route::post('/login', 'ApiAuthController@login');
Route::post('/me', 'ApiAuthController@me');
Route::post('/logout', 'ApiAuthController@logout');
Route::get('/gettoken', function () {
    return csrf_token();
});

Route::get('/gettoken', function () {
    return "hello from heroku a";
});

Route::get('/category', 'CategoryController@index');
Route::post('/category', 'CategoryController@store');
Route::get('/category/{id}', 'CategoryController@show');
Route::put('/category/{id}', 'CategoryController@update');
Route::delete('/category/{id}', 'CategoryController@destroy');

Route::get('/slide', 'SlideController@index');
Route::post('/slide', 'SlideController@store');
Route::delete('slide/{id}', 'SlideController@destroy');

Route::get('/product', 'ProductController@index');
Route::post('/product', 'ProductController@store');
Route::get('/product/{id}', 'ProductController@show');
Route::put('/product/{id}', 'ProductController@update');
Route::delete('/product/{id}', 'ProductController@destroy');

Route::post('/comment', 'CommentController@store');
Route::put('/comment', 'CommentController@update');
Route::delete('/comment', 'CommentController@destroy');

Route::get('/bill', 'BillController@index');
Route::post('/bill', 'BillController@store');
Route::get('/bill/{id}', 'BillController@show');
Route::put('/bill', 'BillController@update');
Route::delete('/bill/{id}', 'BillController@destroy');


Route::post('/getlistbillbyuserid', 'BillController@showbyuserid');
