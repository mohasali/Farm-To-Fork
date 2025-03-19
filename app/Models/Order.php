<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    protected $fillable = ['status'];

    public static $orderedStatuses = ['Pending', 'Processing', 'Shipped', 'Out For Delivery', 'Delivered', 'Completed', 'Canceled','Returned'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function itemOrders()
    {
        return $this->hasMany(ItemOrder::class);
    }

    public function refund(){
        return $this->hasOne(Refund::class);
    }
}
