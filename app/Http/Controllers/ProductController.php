<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;
use App\Cart;
use Stripe\Charge;
use Session;
use Stripe\Stripe;
class ProductController extends Controller
{
    public function getIndex(){
		$products = Product::all();
		return view('shop.index', compact('products'));
	}
	
	public function getAddToCart(Request $request, $id){
		$product = Product::find($id);
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->add($product, $product->id);
		$request->session()->put('cart', $cart);
	
		return redirect('/');
	}
	
	public function getCart(){
		if(!Session::has('cart')){
			return view('shop.shopping-cart');
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
	}
	
	public function getCheckout(){
		if(!Session::has('cart')){
			return view('shop.shopping-cart');
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		$total = $cart->totalPrice;
		return view('shop.checkout', compact('total'));
	}
	
	public function postCheckout(Request $request){
		if(!Session::has('cart')){
			return redirect('shopping-cart');
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		Stripe::setApiKey('sk_test_fUXi14fgbCxe8XvOeV03xhr3');
        try {
            Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge"
            ));
        } catch (\Exception $e) {
            return redirect('checkout')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        return redirect('/')->with('success', 'Successfully purchased products!');
	}
}
