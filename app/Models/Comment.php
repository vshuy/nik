<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
    // protected $with = ['user', 'product'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
