<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    public function point()
    {
        return $this->hasMany(Point::class);
    }

    public function delivery_log()
    {
        return $this->hasOne(DeliveryLog::class);
    }
}
