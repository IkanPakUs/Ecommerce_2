<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{   
    public $transactions, $store_grow;

    public function __invoke(Request $request)
    {   
        $this->setVariable();

        $transactions = $this->transactions;
        $store_grow = $this->store_grow;

        return view('admin.dashboard', compact('transactions', 'store_grow'));
    }

    protected function setVariable() {
        // Register your method here

        $this->store_grow = (object) [];
        $this->setTransaction();
        $this->setStoreProductSell();
        $this->setStoreIncome();
        $this->setChart();

    }

    protected function setTransaction() {
        $this->transactions = Transaction::orderBy('created_at', 'desc')->limit(10)->get();
    }

    protected function setStoreProductSell() {
        $transaction_details = TransactionDetail::all();

        $product_selling = $transaction_details->filter(function ($transaction) {
            return $transaction->transaction->status == 1;
        })->reduce(function ($total, $transaction) {
            return $total + $transaction->quantity;
        });

        $this->store_grow->product_selling = $product_selling ?? 0;
    }

    protected function setStoreIncome() {
        $transaction = $this->transactions;

        $income = $transaction->filter(function ($transaction) {
            return $transaction->status == 1;
        })->reduce(function ($total, $transaction) {
            return $total + $transaction->grandtotal;
        });

        $this->store_grow->income = $income ?? 0;
    }

    protected function setChart() {
        $transaction = $this->transactions;

        $success = $transaction->filter(function ($transaction) {
            return $transaction->status == 1;
        })->count();

        $pending = $transaction->filter(function ($transaction) {
            return $transaction->status == 3;
        })->count();

        $failed = $transaction->filter(function ($transaction) {
            return $transaction->status == 2;
        })->count();

        $this->store_grow->success = $success;
        $this->store_grow->pending = $pending;
        $this->store_grow->failed = $failed;
    }
}
