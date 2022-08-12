<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    //
    function index(Request $request) {
        $cartItems = $this->getCartItems();
        // return response()->view('cart.index')->cookie(
        //     'cart', $cart, 0.1
        // );
        Cookie::queue('name', 'value', 1);
        return view('cart.index', [
            "cartItems" => $cartItems
        ]);
    }

    public function updateCookie(Request $request){
        $cart = $this->getCartFromCookie();
        foreach($cart as $productId => $allQuantity){
            $key = "product_" . $productId;
            if($request->has($key)){
                $cart[$productId] = $request->input($key);
            }
        }
        $cart = json_encode($cart, true);
        Cookie::queue(
            Cookie::make('cart', $cart, 60 * 24 * 7, null, null, false, false)
        );
        return redirect()->route('cart.index');
    }

    public function deleteCookie(Request $request){
        if($request->has('id')){
            $productId = $request->input('id');
            $cart = $this->getCartFromCookie();
            if(isset($cart[$productId])){
                unset($cart[$productId]);
                $cartToJson = empty($cart) ? "{}" : json_encode($cart, true);
                Cookie::queue(
                    Cookie::make('cart', $cartToJson, 60 * 24 * 7, null, false, false)
                );
                return response('success');
            }
        }
        return response('failed');
    }

    private function getCartFromCookie(){
        $cart = Cookie::get('cart');

        return (!is_null($cart)) ? json_decode($cart, true) : [];
    }
    private function getCartItems(){
        $cart = $this->getCartFromCookie();
        $productIds = array_keys($cart);
        $cartItems = array_map(function($productId) use ($cart){
            $quantity = $cart[$productId];
            $product = $this->getProduct($productId);
            if(is_null($product)){
                return null;
            }else{
                return [
                    "product" => $product,
                    "quantity" => $quantity
                ];
            }
        }, $productIds);
        return $cartItems;
    }
    private function getProduct($id){
        $products = $this->getProducts();
        foreach($products as $product){
            if($product['id'] == $id){
                return $product;
            }
        }
        return null;
    }
    private function getProducts()
    {
        return [
                [
                    "id" => 1,
                    "name" => "Orange",
                    "price" => 100,
                    "imgUrl" => asset('images/orange01.jpg')
                ],
                [
                    "id" => 2,
                    "name" => "Apple",
                    "price" => 200,
                    "imgUrl" => asset('images/apple01.jpeg')
                ]
              ];
    }

}
