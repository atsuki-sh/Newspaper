<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function point()
    {
        return $this->hasOne(Point::class);
    }

    protected $fillable =[
        'name',
        'tel',
        'address',
        'copy',
    ];
}
