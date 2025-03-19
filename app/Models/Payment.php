<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Payment extends Model
{
    protected $guarded=[];

    // Encrypt card number before saving
    public function setCardAttribute($value)
    {
        $this->attributes['card'] = Crypt::encryptString($value);
    }

    // Decrypt card number when retrieving
    public function getCardAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    // Encrypt CVV before saving
    public function setCvvAttribute($value)
    {
        $this->attributes['cvv'] = Crypt::encryptString($value);
    }

    // Decrypt CVV when retrieving
    public function getCvvAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
