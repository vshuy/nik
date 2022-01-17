<?php

use App\Product;
use App\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;

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


Route::get('/gettoken', function () {
    return "hello from heroku ab";
});

Route::post('/user/login', 'ApiAuthController@login');
Route::post('/user/register', 'ApiAuthController@register');
Route::post('/user/logout', 'ApiAuthController@logout');

Route::get('/category', 'CategoryController@index');
Route::post('/category', 'CategoryController@store');
Route::get('/category/{id}', 'CategoryController@show');
Route::put('/category/{id}', 'CategoryController@update');
Route::delete('/category/{id}', 'CategoryController@destroy');

Route::get('/slide', 'SlideController@index');
Route::post('/slide', 'SlideController@store');
Route::delete('slide/{id}', 'SlideController@destroy');

Route::get('/product/pg', 'ProductController@indexPaginate');
Route::post('product/search', 'ProductController@search');

Route::get('/product', 'ProductController@index');
Route::post('/product', 'ProductController@store');
Route::get('/product/{id}', 'ProductController@show');
Route::put('/product/{id}', 'ProductController@update');
Route::delete('/product/{id}', 'ProductController@destroy');

Route::post('/comment', 'CommentController@store');
Route::get('/comment/{id}', 'CommentController@show');
Route::put('/comment/{id}', 'CommentController@update');
Route::delete('/comment/{id}', 'CommentController@destroy');

Route::post('/comment-post', 'CommentPostController@store');
Route::get('/comment-post/{id}', 'CommentPostController@show');
Route::put('/comment-post/{id}', 'CommentPostController@update');
Route::delete('/comment-post/{id}', 'CommentPostController@destroy');

Route::get('/bill', 'BillController@index');
Route::post('/bill', 'BillController@store');
Route::get('/bill/{id}', 'BillController@show');
Route::put('/bill/{id}', 'BillController@update');
Route::delete('/bill/{id}', 'BillController@destroy');

Route::get('/post', 'PostController@index');
Route::post('/post', 'PostController@store');
Route::get('/post/{id}', 'PostController@show');
Route::put('/post/{id}', 'PostController@update');
Route::delete('/post/{id}', 'PostController@destroy');

Route::get('/role', 'RoleController@index');
Route::post('/role', 'RoleController@store');
Route::get('/role/{id}', 'RoleController@show');
Route::put('/role/{id}', 'RoleController@update');
Route::get('/role-create', 'RoleController@create');
Route::get('/role/{id}/edit', 'RoleController@edit');
Route::delete('/role/{id}', 'RoleController@destroy');

Route::get('/permission', 'PermissionController@index');
Route::post('/permission', 'PermissionController@store');
Route::get('/permission/{id}', 'PermissionController@show');
Route::put('/permission/{id}', 'PermissionController@update');
Route::delete('/permission/{id}', 'PermissionController@destroy');

Route::get('/category-post', 'CategoryPostController@index');
Route::post('/category-post', 'CategoryPostController@store');
Route::get('/category-post/{id}', 'CategoryPostController@show');
Route::put('/category-post/{id}', 'CategoryPostController@update');
Route::delete('/category-post/{id}', 'CategoryPostController@destroy');

Route::get('/brands', 'BrandController@index');
Route::get('/rams', 'RamController@index');
Route::get('/memories', 'MemoryController@index');

Route::post('/getlistbillbyuserid', 'BillController@showbyuserid');
