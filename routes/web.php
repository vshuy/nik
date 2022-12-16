<?php


use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/






Auth::routes(['verify' => true]);
Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return "good i'm already ok";
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/paypalexam', 'PaypalController@testPay');
