<?php

namespace App\Http\Controllers;

use App\BillStatus;
use Illuminate\Http\Request;

class BillStatusController extends Controller
{
    public function index()
    {
        $listBrand = BillStatus::all();
        return response()->json($listBrand);
    }
}
