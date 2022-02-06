<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailBill extends Model
{
    protected $table = "detail_bills";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
