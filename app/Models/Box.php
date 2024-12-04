<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Enums\BoxType;


class Box extends Model
{
 
   

    protected $fillable = ['title','type','price','description','imagePath'];

    // protected $casts = ['type' => BoxType::class] ;
    
    public static function getEnumTypes(): array
    {
        return array_column(BoxType::cases(), 'value');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    
    public function itemOrders()
    {
        return $this->hasMany(ItemOrder::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
