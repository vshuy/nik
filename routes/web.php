<?php

use App\Bill;
use App\DetailBill;
use App\Mail\BillNotify;
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
Route::get('/sendmaildirect', function () {
    $result = collect([
        "bill" => Bill::with(['billStatus', 'user'])->find(4),
        "detailBill" => DetailBill::with(['product'])->where('bill_id', '=', 4)->get(),
    ]);

    return view('mail.notifyBill')->with(['result' => $result]);
});
Route::get('/sendmail', function () {
    $bill = Bill::with(['billStatus', 'user'])->find(4);
    $detailBill = DetailBill::with(['product'])->where('bill_id', '=', 4)->get();
    $result = collect([
        "bill" => $bill,
        "detailBill" => $detailBill,
    ]);
    Mail::send('mail.notifyBill', array('result' =>$result), function ($message) {
        $message->to('m1342a65@gmail.com', 'Checkout')->subject('Notify checkout');
    });
    return true;
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/paypalexam', 'PaypalController@testPay');
