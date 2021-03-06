<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "addresses";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
