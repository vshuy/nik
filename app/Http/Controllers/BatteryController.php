<?php

namespace App\Http\Controllers;

use App\Battery;
use Illuminate\Http\Request;

class BatteryController extends Controller
{
    public function index()
    {
        $listBrand = Battery::all();
        return response()->json($listBrand);
    }
}
