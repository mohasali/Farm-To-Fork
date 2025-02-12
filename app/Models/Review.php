<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    //link userId FK to the reviews
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
