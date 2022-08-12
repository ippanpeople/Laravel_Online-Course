<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('home');
});

//這種將欲讓blade表示的內容, 透過在routes中寫入變數, 使在url中的參數被回傳(return view)的頁面(blade)讀取並表示(query)的寫法會導致內容變數越來越多,
//‘管理, 控制’ -> (controller) 不方便, 應該讓 routes 只管 ‘網頁路徑’ -> (routing：要view哪個blade) , 而在管理控制讀取或抓取(query)動態回傳的參數時應該使用controller來控制資料來源
//而欲在routes中使用controller的資料時必須先 使用php artisan make:controller controller_name創建controller 並用use App\Http\Controllers\UserController; 先將routes與controller進行連接
// Route::get('/test', function () {

//     $version = $_GET['version'];
//     $information = $_GET['info'];

//     return view('test', [
//         'ver' => $version,
//         'info' => $information
//     ]);
// });
Route::get('/test', [TestController::class, 'test']); //Route::get('路徑', [controller名::class, 'blade名']);


Route::get('/layouts', function () {
    return view('layouts/template');
});

// Route::get('/products/{id}',
//     [ProductController::class, 'show']
// )->where('id', '[0-9]+'); //Route::get('url路徑', [controller名::class, 'controller中的function名']);

Route::resource('products', ProductController::class); //php artisan make:controller OrderController --resource 後 一次生成所有請求方法route的寫法
Route::resource('orders', OrderController::class);

Route::patch('cart/cookie', [CartController::class, 'updateCookie'])->name('cart.cookie.update');
Route::delete('cart/cookie', [CartController::class, 'deleteCookie'])->name('cart.cookie.delete');
Route::resource('cart', CartController::class);
