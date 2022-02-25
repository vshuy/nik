<?php

namespace App\Http\Controllers;

use App\Model\Battery;
use Illuminate\Http\Request;

class BatteryController extends Controller
{
    public function index()
    {
        $brands = Battery::all();
        return response()->json($brands);
    }
}
