<?php

namespace App\Http\Controllers;

use App\DisplaySize;
use Illuminate\Http\Request;

class DisplaySizeController extends Controller
{
    public function index()
    {
        $displays = DisplaySize::all();
        return response()->json($displays);
    }
}
