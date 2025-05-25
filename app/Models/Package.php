<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Package extends Model
{

protected $fillable = [
    'category_id', 'title', 'description', 'location', 'image', 'price', 'duration_days', 'available_from', 'available_to',
];
   public function category()
{
    return $this->belongsTo(Category::class);
}

 public static function boot()
    {
        parent::boot();

        static::creating(function ($package) {
            $package->slug = Str::slug($package->title);
        });

        static::updating(function ($package) {
            $package->slug = Str::slug($package->title);
        });
    }
}
