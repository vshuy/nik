<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    public $timestamps = true;
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
}
