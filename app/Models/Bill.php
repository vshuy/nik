<?php

namespace App\Models;

use App\Models\User;
use App\Models\Address;
use App\Models\BillStatus;
use App\Models\DetailBill;
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
