<?php

namespace App\Http\Controllers;

use App\bill;
use App\detail_bill;
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
            ->select('bills.id', 'users.name', 'bills.total')
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
        $idProducts = [];
        $idProducts = $request->id_products;
        $user_id = $request->user_id;
        $sum = $request->total;
        $abill = new bill();
        $abill->user_id = $user_id;
        $abill->total = floatval($sum);
        $abill->save();
        $idBill = $abill->id;
        foreach ($idProducts as &$item) {
            $item['bill_id'] = $idBill;
        }
        DB::table('detail_bills')->insert($idProducts);
        return floatval(1.0);
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
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $url = "https://";
        } else {
            $url = "http://";
        }
        $url .= $_SERVER['HTTP_HOST'];
        foreach ($listBill as &$value) {
            $value->urlimg = $url . "/" . $value->urlimg;
        }
        $billInfo = DB::table('bills')
            ->join('users', 'users.id', '=', 'bills.user_id')
            ->select('bills.id', 'users.name', 'bills.total')
            ->where('bills.id', '=', $request->id)
            ->get();
        $userInfor = DB::table('users')
            ->select('users.name', 'users.email')
            ->where('users.id', '=', $request->user_id)
            ->get();
        $result = collect([
            "userInfor" => $userInfor,
            "listBill" => $listBill,
            "billInfor" => $billInfo,
        ]);
        return $result;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $aCategory = bill::find($request->id);
        $aCategory->delete();
    }
}
