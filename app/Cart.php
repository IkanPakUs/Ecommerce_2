<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cart extends Model
{
    //
    protected $fillable = ["user_id", "product_id", "quantity"];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function product() {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
