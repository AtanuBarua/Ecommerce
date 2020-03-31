<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $product = Product::find($request->id);

        Cart::add([
            'id'    => $request->id,
            'name'  => $product->product_name,
            'price' => $product->product_price,
            'qty'   => $request->qty,
            'weight' => 550,
            'options' => ['img' => $product->product_image]
        ]);

        return redirect('/cart/show');
    }

    public function showCart(){

        $cartItems = Cart::content();
        return view('front-end.cart.show-cart', [
            'cartItems' => $cartItems
        ]);
    }

    public function deleteCart($id){
        Cart::remove($id);
        return redirect('/cart/show')->with('message','Item deleted');
    }

    public function updateCart(Request $request){
        Cart::update($request->rowId, $request->qty);
        return redirect('/cart/show')->with('message','Item updated');
    }
}
