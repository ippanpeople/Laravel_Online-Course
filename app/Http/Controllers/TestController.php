<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    //
    function test(Request $request){

        $title = 'Title';
        //不太會在laravel中使用get, 一般使用request來取得query, laravel中的request(請求), 可以同時執行get, post！！非常方便！！
        $version = $request -> input('version');
        $information = $request -> input('information');

        return view('test', [
            't' => $title,
            'ver' => $version,
            'info' => $information
        ]);

    }
}
