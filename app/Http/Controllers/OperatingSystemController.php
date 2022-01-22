<?php

namespace App\Http\Controllers;

use App\OperatingSystem;
use Illuminate\Http\Request;

class OperatingSystemController extends Controller
{
    public function index()
    {
        $listBrand = OperatingSystem::all();
        return response()->json($listBrand);
    }
}
