<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteReview extends Model
{
    protected $guarded = null;
    //link userId FK to the reviews
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
