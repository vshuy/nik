<?php

namespace App\Http\Controllers;

use App\BillStatus;
use Illuminate\Http\Request;

class BillStatusController extends Controller
{
    public function index()
    {
        $bill_status = BillStatus::all();
        return response()->json($bill_status);
    }
}
