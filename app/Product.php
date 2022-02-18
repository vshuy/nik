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
    public function display()
    {
        return $this->belongsTo(DisplaySize::class);
    }
    public function battery()
    {
        return $this->belongsTo(Battery::class);
    }
    public function opera()
    {
        return $this->belongsTo(OperatingSystem::class, 'operating_system_id', 'id');
    }
    public function scopeBrand($query, $request)
    {
        if ($request->has('brand_ids') && count($request->brand_ids) > 0) {
            $query->whereIn('brand_id', $request->brand_ids);
        }
        return $query;
    }
    public function scopeRam($query, $request)
    {
        if ($request->has('ram_ids') && count($request->ram_ids) > 0) {
            $query->whereIn('ram_id', $request->ram_ids);
        }
        return $query;
    }
    public function scopeMemory($query, $request)
    {
        if ($request->has('memory_ids') && count($request->memory_ids) > 0) {
            $query->whereIn('memory_id', $request->memory_ids);
        }
        return $query;
    }
    public function scopeBattery($query, $request)
    {
        if ($request->has('battery_ids') && count($request->battery_ids) > 0) {
            $query->whereIn('battery_id', $request->battery_ids);
        }
        return $query;
    }
    public function scopeDesc($query, $request)
    {
        if ($request->has('order') && $request->order == "desc") {
            $query->orderBy('cost', 'desc');
        }
        return $query;
    }
    public function scopeAsc($query, $request)
    {
        if ($request->has('order') && $request->order == "asc") {
            $query->orderBy('cost', 'asc');
        }
        return $query;
    }
}
