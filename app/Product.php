<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    public function mediaUrl() {
        return $this->hasMany('App\Media');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
