<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaypalService\CreatePayoutSample;

class PaypalController extends Controller
{
    public function testPay()
    {
        $payObject = new CreatePayoutSample();
        $payObject->createPayout();
    }
}
