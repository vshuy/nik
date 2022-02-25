<?php

namespace App\Http\Controllers;

use App\Model\DisplaySize;
use Illuminate\Http\Request;

class DisplaySizeController extends Controller
{
    public function index()
    {
        $displays = DisplaySize::all();
        return response()->json($displays);
    }
}
