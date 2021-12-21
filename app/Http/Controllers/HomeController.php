<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __invoke(Request $request) {
        $products = Product::all();

        return view('index', compact('products'));
    }
}
