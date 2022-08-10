<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = $this->getProducts();
        print_r($products);
        return view('product.index',[
            "products" => $products,
        ]);
    }

    //一般若要展示display物件時會使用show作為function name
    function show($id, Request $request)
    {
        // $id = $request->input('id');

        $products = $this->getProducts();

        $index = $id - 1;
        // $imageUrl = asset('images/orange01.jpg');
        if($index >= 0 && $index <= count($products) - 1){
            //show(return) : page
            $product = $products[$index];

            print_r($product);
            var_dump($product['imgUrl']);

            return view('product.show', [
                "product" => $product,
                "productUrl" => $product['imgUrl']
            ]);

        }else{
            //show : 404
            abort(404); //error handling : HTTP Exceptions
        }

    }

    private function getProducts()
    {
        return [
                [
                    "id" => 1,
                    "imgUrl" => asset('images/orange01.jpg')
                ],
                [
                    "id" => 2,
                    "imgUrl" => asset('images/apple01.jpeg')
                ]
              ];
    }
}
