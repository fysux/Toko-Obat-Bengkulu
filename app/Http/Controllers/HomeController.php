<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('app.home' , compact('products'));
    }

    public function buy($productID)
    {
        $product = Product::findorFail($productID);
        return view('app.dashboard.product.beli', compact('product'));
    }
}
