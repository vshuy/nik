<?php

namespace App\Model;

use App\Model\User;
use App\Model\Address;
use App\Model\BillStatus;
use App\Model\DetailBill;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";
    public $timestamps = true;
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
    public function billStatus()
    {
        return $this->belongsTo(BillStatus::class, 'paid_status', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    public function details()
    {
        return $this->hasMany(DetailBill::class);
    }
}
