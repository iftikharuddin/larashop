<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;

class ProductController extends Controller
{
    public function getIndex(){
		$products = Product::all();
		return view('shop.index', compact('products'));
	}
}
