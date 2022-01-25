<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    // public $idBill;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listBill = DB::table('bills')
            ->join('users', 'users.id', '=', 'bills.user_id')
            ->select('bills.id', 'users.name', 'bills.total', 'bills.paid')
            ->get();
        return response()->json($listBill);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $itemProducts = [];
        $itemProducts = $request->items;
        $aBill = new Bill();
        $aBill->user_id = auth('api')->user()->id;
        $aBill->total = floatval($request->total);
        $aBill->paid_status = 1;
        $aBill->save();
        $idBill = $aBill->id;
        foreach ($itemProducts as &$item) {
            $item['bill_id'] = $idBill;
        }
        DB::table('detail_bills')->insert($itemProducts);
        return response()->json(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $listBill = DB::table('detail_bills')
            ->join('products', 'products.id', '=', 'detail_bills.product_id')
            ->select('products.id', 'products.name', 'products.urlimg', 'products.cost', 'detail_bills.amounts')
            ->where('bill_id', '=', $request->id)
            ->get();
        $billInfo = DB::table('bills')
            ->join('users', 'users.id', '=', 'bills.user_id')
            ->select('bills.id', 'users.name', 'bills.total')
            ->where('bills.id', '=', $request->id)
            ->get();
        $userInfor = DB::table('users')
            ->select('users.name', 'users.email')
            ->where('users.id', '=', $billInfo[0]->id)
            ->get();
        $result = collect([
            "userInfor" => $userInfor,
            "listBill" => $listBill,
            "billInfor" => $billInfo,
        ]);
        return $result;
    }
    public function showbyuserid(Request $request)
    {
        $listBill = DB::table('bills')
            ->select('bills.id', 'bills.created_at', 'bills.total', 'bills.paid_status')
            ->where('bills.user_id', '=', $request->user_id)
            ->get();
        return response()->json($listBill);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bill $bill)
    {
        $aBill = Bill::find($request->id);
        $aBill->paid = $request->check_value;
        $aBill->save();
        return Response()->json(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $aBill = Bill::find($request->id);
        $aBill->delete();
    }
}
