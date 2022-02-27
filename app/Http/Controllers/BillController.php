<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use App\Models\DetailBill;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('role:admin', ['except' => ['store', 'show', 'showbyuserid']]);
    }
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
        $aBill->address_id = $request->address_id;
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
            "bill" => Bill::with(['billStatus', 'user', 'address'])->find($request->id),
            "detailBill" => DetailBill::with(['product'])->where('bill_id', '=', $request->id)->get(),
        ]);
        return $result;
    }
    public function showbyuserid()
    {
        $user_id = auth('api')->user()->id;
        $bills = Bill::with(['billStatus', 'user', 'address'])->whereUserId($user_id)->get();
        return response()->json($bills);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(bill $bill)
    {
        //
    }

    public function getBillsToday()
    {
        // $listBill = Bill::with(['billStatus', 'user', 'address'])->whereDate('created_at', '=', Carbon::today()->toDateString())->get();
        $today = Carbon::today()->toDateString();
        $new_bills = Bill::whereDate('created_at', '=', $today)->count();
        $new_customers = User::whereDate('created_at', '=', $today)->count();
        $purchases_today = DB::table('bills')
            ->whereDate('created_at', '=', $today)
            ->sum('bills.total');
        $result = collect([
            "new_bills" => $new_bills,
            "new_customers" => $new_customers,
            "purchases_today" => $purchases_today,
        ]);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $bill = Bill::find($request->id);
        $bill->paid_status = $request->paid_status;
        $bill->save();
        return Response()->json(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $bill = Bill::find($request->id);
        $bill->delete();
    }
}
