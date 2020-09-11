<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::where('featured', true)->take(8)->inRandomOrder()->get();
        return view('index')->with('products', $products);
    }
}
