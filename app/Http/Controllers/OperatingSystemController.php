<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OperatingSystem;

class OperatingSystemController extends Controller
{
    public function index()
    {
        $operates = OperatingSystem::all();
        return response()->json($operates);
    }
}
