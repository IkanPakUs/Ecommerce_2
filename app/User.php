<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function role() {
        return $this->hasOne('App\UserRole');
    }

    public function transaction() {
        return $this->hasMany('App\Transaction');
    }

    public function cart() {
        return $this->hasMany('App\Cart');
    }

    public function getCartCountAttribute() {
        $cart = $this->cart;

        if ($cart->isEmpty()) {
            return 0;
        }

        $cart = $cart->reduce(function ($total, $item) {
            return $total + $item->quantity;
        });

        return $cart;
    }

    public function getTotalPriceAttributte() {
        $cart = $this->cart;

        if ($cart->isEmpty()) {
            return 0;
        }

        $price = $cart->reduce(function ($total, $item) {
            $price = $item->product->price * $item->quantity;
            return $total + $price;
        });

        return $price;
    }
}
