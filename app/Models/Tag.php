<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    public function boxes(){
        return $this->belongsToMany(Box::class);
    }

    public function recipes(){
        return $this->belongsToMany(Recipe::class);
    }
}
