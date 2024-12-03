<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    //
    protected $fillable = [
        'address_line1',
        'address_line2',
        'city',
        'county',
        'country',
        'postcode',
        'user_id'
    ];
}
