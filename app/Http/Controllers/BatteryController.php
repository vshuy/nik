<?php

namespace App\Http\Controllers;

use App\Models\Battery;
use Illuminate\Http\Request;

class BatteryController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin', ['except' => ['index']]);
    }
    public function index()
    {
        $brands = Battery::all();
        return response()->json($brands);
    }
}
