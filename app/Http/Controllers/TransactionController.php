<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function index(Request $request) {
        $transactions = Transaction::all();

        return view('admin.transaction.index', compact('transactions'));
    }

    public function submitted(Request $request) {
        $user = Auth::user();
        $cart = $user->cart;

        $transaction_obj = (object) [
            "code" => $request->transaction_code,
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone_number,
            "address" => $request->address,
        ];

        try {
            $this->storeData($user, $cart, $transaction_obj);
            
            $cart_id = $cart->pluck('id');
            Cart::destroy($cart_id);
            return redirect()->route('product.transaction.finished');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('user.cart');
        }

    }

    public function confirmed(Transaction $Transaction) {
        $Transaction->status = 1;
        $Transaction->save();

        return redirect()->back();
    }

    public function finished() {
        return view('user.success');
    }

    public function storeData($user, $cart, $transaction_obj) {

        try {
            $transaction = new Transaction();
                $transaction->code = $transaction_obj->code;
                $transaction->user_id = $user->id;
                $transaction->phone = $transaction_obj->phone;
                $transaction->email = $transaction_obj->email;
                $transaction->name = $transaction_obj->name;
                $transaction->address = $transaction_obj->address;
                $transaction->grandtotal = $user->total_price;
            $transaction->save();
    
            $cart = $cart->map(function ($item) use($transaction) {
                return [
                    "transaction_id" => $transaction->id,
                    "product_id" => $item->product_id,
                    "price" => $item->product->price,
                    "quantity" => $item->quantity 
                ];
            })->toArray();
    
            $transaction->details()->createMany($cart);

        } catch (\Throwable $e) {
            throw $e;
        }
    }
}
