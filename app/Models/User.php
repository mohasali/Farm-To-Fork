<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'contact_preferences',
        'upvotes'
        ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);

    }

    public function addresses(){
        return $this->hasMany(Address::class);

    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }
    
    public function reward() {
        return $this->hasOne(Reward::class);
    }

    public function promoCodes() {
        return $this->hasMany(PromoCode::class);
    }
    
    public function eggHunt(){
        return $this->hasMany(EggHunt::class);
    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
