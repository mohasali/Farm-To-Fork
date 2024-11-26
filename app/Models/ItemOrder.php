<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function box()
    {
        return $this->belongsTo(Box::class);
    }
}
