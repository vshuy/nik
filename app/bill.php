<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    protected $table = "bills";
    public $timestamps = true;
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
}
