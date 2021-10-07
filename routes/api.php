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
Route::get('/getlistproduct', function () {
    $listProduct = Product::all();
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $url = "https://";
    } else {
        $url = "http://";
    }
    $url .= $_SERVER['HTTP_HOST'];
    foreach ($listProduct as &$value) {
        $value->urlimg = $url . "/" . $value->urlimg;
    }
    return response()->json($listProduct);
});

Route::post('/uploadcategory', 'CategoryController@store');
Route::get('/getlistcategory', 'CategoryController@index');
Route::post('/deletecategoryby/{id}', 'CategoryController@destroy');
Route::get('/getdetailcategoryby/{id}', 'CategoryController@show');
Route::post('/updatecategory', 'CategoryController@update');

Route::post('/uploadslide', 'SlideController@store');
Route::get('/getlistslide', 'SlideController@index');
Route::post('deleteslideby/{id}', 'SlideController@destroy');

Route::post('/uploadproduct', 'ProductController@store');
Route::get('/getlistproductdb', 'ProductController@index');
Route::get('/getdetailproductby/{id}', 'ProductController@show');
Route::post('/updateproduct', 'ProductController@update');
Route::post('deleteproductby/{id}', 'ProductController@destroy');

Route::post('/uploadcomment', 'CommentController@store');
Route::post('/deletecomment', 'CommentController@destroy');
Route::post('/updatecomment', 'CommentController@update');

Route::post('/uploadbill', 'BillController@store');
Route::get('/getlistbill', 'BillController@index');
Route::post('/deletebill', 'BillController@destroy');
Route::post('/detailbillby/{id}', 'BillController@show');
Route::post('/getlistbillbyuserid', 'BillController@showbyuserid');
