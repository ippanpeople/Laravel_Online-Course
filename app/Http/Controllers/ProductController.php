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
                // "productUrl" => $product['imgUrl']
            ]);

        }else{
            //show : 404
            abort(404); //error handling : HTTP Exceptions
        }

    }

    public function create ()
    {
        return view('product.create');
    }
    public function update (Request $request, $id)
    {
        // $method = $request->method();
        // print_r($method);
        $products = $this->getProducts();
        $index = $id -1;
        if($index < 0 || $index >= count($products)){
            abort(404);
        }

        $product = $products[$index];

        return redirect()->route('products.edit', ['product' => $product['id']]);
    }
    public function destroy ($id)
    {
        //刪除後就沒有product頁面了 所以應該要重新導向回 index
        return redirect()->route('products.index');
    }
    public function store ()
    {
        return redirect()->route('products.index');
    }
    public function edit ($id)
    {
        $products = $this->getProducts();
        $index = $id -1;
        if($index < 0 || $index >= count($products)){
            abort(404);
        }

        $product = $products[$index];
        return view('product.edit', [
            "product" => $product
        ]);
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
