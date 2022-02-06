<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillStatus extends Model
{
    protected $table = "bill_statuses";
    protected $primaryKey = 'id';
}
