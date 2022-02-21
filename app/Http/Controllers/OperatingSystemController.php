<?php

namespace App\Http\Controllers;

use App\OperatingSystem;
use Illuminate\Http\Request;

class OperatingSystemController extends Controller
{
    public function index()
    {
        $operates = OperatingSystem::all();
        return response()->json($operates);
    }
}
