<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function delivery_detail()
    {
        return $this->hasMany(DeliveryDetail::class, );
    }
}
