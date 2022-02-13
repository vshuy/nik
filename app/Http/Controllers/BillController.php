<?php

namespace App\Http\Controllers;

use App\Bill;
use App\DetailBill;
use App\Mail\BillNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        // $listBill = DB::table('bills')
        //     ->join('users', 'users.id', '=', 'bills.user_id')
        //     ->select('bills.id', 'users.name', 'bills.total', 'bills.paid_status')
        //     ->get();
        $Bills = Bill::with(['billStatus', 'user'])->get();
        return response()->json($Bills);
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
        $aBill->paid_status = $request->paid_status;
        $aBill->save();
        $idBill = $aBill->id;
        foreach ($itemProducts as &$item) {
            $item['bill_id'] = $idBill;
        }
        DB::table('detail_bills')->insert($itemProducts);

        $bill = Bill::with(['billStatus', 'user'])->find($aBill->id);
        $detailBill = DetailBill::with(['product'])->where('bill_id', '=', $aBill->id)->get();
        $result = collect([
            "bill" => $bill,
            "detailBill" => $detailBill,
        ]);

        Mail::send('mail.notifyBill', array('result' => $result), function ($message) {
            $message->to(auth('api')->user()->email, 'Checkout information')->subject('Notify checkout information');
        });

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
        // $listBill = DB::table('detail_bills')
        //     ->join('products', 'products.id', '=', 'detail_bills.product_id')
        //     ->select('products.id', 'products.name', 'products.link_thumbnail', 'products.cost', 'detail_bills.amounts')
        //     ->where('bill_id', '=', $request->id)
        //     ->get();
        // $billInfo = DB::table('bills')
        //     ->join('users', 'users.id', '=', 'bills.user_id')
        //     ->select('bills.id', 'users.name', 'bills.total')
        //     ->where('bills.id', '=', $request->id)
        //     ->get();
        // $userInfor = DB::table('users')
        //     ->select('users.name', 'users.email')
        //     ->where('users.id', '=', $billInfo[0]->id)
        //     ->get();
        // $result = collect([
        //     "userInfor" => $userInfor,
        //     "listBill" => $listBill,
        //     "billInfor" => $billInfo,
        // ]);
        $result = collect([
            "bill" => Bill::with(['billStatus', 'user'])->find($request->id),
            "detailBill" => DetailBill::with(['product'])->where('bill_id', '=', $request->id)->get(),
        ]);
        return $result;
    }
    public function showbyuserid(Request $request)
    {
        $user_id = auth('api')->user()->id;
        $listBill = Bill::with(['billStatus', 'user'])->whereUserId($user_id)->get();
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
        $aBill->paid_status = $request->paid_status;
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
