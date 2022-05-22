<?php

namespace App\Http\Controllers;

use App\Models\Ram;
use App\Models\Brand;
use App\Models\Memory;
use App\Models\Battery;
use App\Models\Category;
use App\Models\DisplaySize;
use Illuminate\Http\Request;
use App\Models\OperatingSystem;

class FilterController extends Controller
{
    public function index()
    {

        $result = collect([
            'batteries' => Battery::all(),
            'brands' => Brand::all(),
            // 'displays' => DisplaySize::all(),
            'memories' => Memory::all(),
            // 'operates' => OperatingSystem::all(),
            'rams' => Ram::all(),
        ]);
        return response($result);
    }
}
