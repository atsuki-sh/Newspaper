<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryRoute extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
    ];

    public function point()
    {
        return $this->hasMany(Point::class);
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }
}
