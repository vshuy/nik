<?php

namespace App\Mail;

use App\Bill;
use App\DetailBill;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BillNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $bill_id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bill_id)
    {
        $this->bill_id = $bill_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $bill = Bill::with(['billStatus', 'user'])->find(4);
        $detailBill = DetailBill::with(['product'])->where('bill_id', '=', 4)->get();
        $result = collect([
            "bill" => $bill,
            "detailBill" => $detailBill,
        ]);

        return view('mail.billEmpty');
    }
}
