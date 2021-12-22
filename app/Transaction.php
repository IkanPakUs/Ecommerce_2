<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    public function details() {
        return $this->hasMany('App\TransactionDetail');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function statusModel() {
        return $this->belongsTo('App\TransactionStatus', 'status');
    }
}
