<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = ["transaction_id", "product_id", "price", "quantity"];

    public function transaction() {
        return $this->belongsTo('App\Transaction', 'transaction_id');
    }
}
