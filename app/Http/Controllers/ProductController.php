<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //一般若要展示display物件時會使用show作為function name
    function show($id, Request $request)
    {
        // $id = $request->input('id');

        $products = [
          [
            "imgUrl" => asset('images/orange01.jpg')
          ],
          [
            "imgUrl" => asset('images/apple01.jpeg')
          ]
        ];
        // $imageUrl = asset('images/orange01.jpg');
        if($id >= 0 && $id <= count($products) - 1){
            //show(return) page
            $product = $products[$id];

            var_dump($product);
            var_dump($product['imgUrl']);

            return view('product.show', [
                "product" => $product,
                "productUrl" => $product['imgUrl']
            ]);

        }else{
            //404
            abort(404);
        }

    }
}
