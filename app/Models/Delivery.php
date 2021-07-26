<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    public function route()
    {
        return $this->hasOne(Route::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function delivery_detail()
    {
        return $this->hasMany(DeliveryDetail::class);
    }
}
