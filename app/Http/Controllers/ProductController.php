<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product_id)
    {
        $product = $product_id;
        $related = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->limit(4)->get();

        return view('catalog.product',compact('product', 'related'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addCart(Request $request) {
        $product = Product::find($request->product);
        $user = Auth::user();

        try {
            $cart = Cart::updateOrCreate(
                ["user_id" => $user->id, "product_id" => $product->id],
                ["user_id" => $user->id, "product_id" => $product->id]
            );

            $quantity = $cart->quantity + ($request->quantity ?? 1);
            $cart->quantity = $quantity;
            $cart->save();
            
            $status = "Product successfully added to your cart.";
            return redirect()->back()->with('success', $status);
        } catch (\Exception $e) {
            \Log::info($e->getMessage());

            $status = "Product cant added to cart, please try again later.";
            return redirect()->back()->with('failed', $status);
        }

    }
}
