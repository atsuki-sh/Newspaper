<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryDetail extends Model
{
    use HasFactory;

    public function delivery_log()
    {
        return $this->belongsTo(DeliveryLog::class);
    }

    public function point()
    {
        return $this->belongsTo(Point::class);
    }
}
