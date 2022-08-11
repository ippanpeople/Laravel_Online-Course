<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    //
    function index(Request $request) {
        $cart = $request->cookie('cart');
        var_dump($cart);

        if(!is_null($cart)){
            $cart = json_decode($cart, true);
            foreach($cart as $productId => $quantity){
                $cart[$productId] = $quantity + 1;
            }
            $cart = json_encode($cart);
        }

        // return response()->view('cart.index')->cookie(
        //     'cart', $cart, 0.1
        // );
        Cookie::queue('name', 'value', 0.1);
        return view('cart.index');
    }
}
