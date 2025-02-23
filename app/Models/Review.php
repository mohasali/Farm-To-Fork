<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = null;
    //link userId FK to the reviews
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function box()
    {
        return $this->belongsTo(Box::class);
    }
}
