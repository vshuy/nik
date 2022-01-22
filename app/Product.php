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
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function ram()
    {
        return $this->belongsTo(Ram::class);
    }
    public function memory()
    {
        return $this->belongsTo(Memory::class);
    }
}
