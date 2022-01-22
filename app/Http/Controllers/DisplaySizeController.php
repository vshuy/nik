<?php

namespace App\Http\Controllers;

use App\DisplaySize;
use Illuminate\Http\Request;

class DisplaySizeController extends Controller
{
    public function index()
    {
        $listBrand = DisplaySize::all();
        return response()->json($listBrand);
    }
}
