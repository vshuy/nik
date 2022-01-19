<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
