<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    public $timestamps = true;
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
}
