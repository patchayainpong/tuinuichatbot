<?php

use Illuminate\Support\Facades\Route;

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
// cart
Route::get('/', [App\Http\Controllers\ProductController::class, 'productList'])->name('products.list');
Route::get('cart', [App\Http\Controllers\CartController::class, 'cartList'])->name('cart.list');
Route::post('cartadd', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [App\Http\Controllers\CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [App\Http\Controllers\CartController::class, 'clearAllCart'])->name('cart.clear');


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [App\Http\Controllers\Controller::class, 'indexnone'])->name('/');
Route::post('/ordertotal', [App\Http\Controllers\StoreController::class, 'ordertotal'])->name('ordertotal');
Route::post('/ordertotalcart', [App\Http\Controllers\Controller::class, 'ordertotalcart'])->name('ordertotalcart');
Route::post('/order', [App\Http\Controllers\Controller::class, 'order'])->name('order');
Route::get('/selltotal', [App\Http\Controllers\Controller::class, 'selltotal'])->name('selltotal');
Route::get('/sellfood', [App\Http\Controllers\Controller::class, 'sellfood'])->name('sellfood');
Route::get('/sellstore', [App\Http\Controllers\Controller::class, 'sellstore'])->name('sellstore');
Route::get('/sellstoreproductlist', [App\Http\Controllers\Controller::class, 'sellstoreproductlist'])->name('sellstoreproductlist');
Route::get('/sellorderproduct', [App\Http\Controllers\Controller::class, 'sellorderproduct'])->name('sellorderproduct');
Route::get('/sellorderproductweb', [App\Http\Controllers\Controller::class, 'sellorderproductweb'])->name('sellorderproductweb');
Route::get('/userorderdetail', [App\Http\Controllers\Controller::class, 'userorderdetail'])->name('userorderdetail');
Route::get('/statusorder', [App\Http\Controllers\Controller::class, 'statusorder'])->name('statusorder');
Route::get('/caloriecalculator', [App\Http\Controllers\Controller::class, 'caloriecalculator'])->name('caloriecalculator');
Route::get('/usercalorie', [App\Http\Controllers\Controller::class, 'usercalorie'])->name('usercalorie');
Route::get('/datausercalorie', [App\Http\Controllers\Controller::class, 'datausercalorie'])->name('datausercalorie');
Route::get('/eathistory', [App\Http\Controllers\Controller::class, 'eathistory'])->name('eathistory');
Route::get('/usereathistoryadd', [App\Http\Controllers\Controller::class, 'usereathistoryadd'])->name('usereathistoryadd');
Route::get('/usereathistorydata', [App\Http\Controllers\Controller::class, 'usereathistorydata'])->name('usereathistorydata');
Route::get('/testjq', [App\Http\Controllers\Controller::class, 'testjq'])->name('testjq');
Route::get('/userdata', [App\Http\Controllers\Controller::class, 'userdata'])->name('userdata');
Route::get('/addmoremenu', [App\Http\Controllers\Controller::class, 'addmoremenu'])->name('addmoremenu');
Route::get('/datamoremenu', [App\Http\Controllers\Controller::class, 'datamoremenu'])->name('datamoremenu');
Route::get('/removemoremenu', [App\Http\Controllers\Controller::class, 'removemoremenu'])->name('removemoremenu');


// storehomepage
Route::post('/homepagedetailfood', [App\Http\Controllers\Controller::class, 'homepagedetailfood'])->name('homepagedetailfood');


Auth::routes(['verify' => true]);
// user

// Route::get('/', [App\Http\Controllers\Controller::class, 'indexnone'])->name('/');

// store
Route::middleware(['auth', 'isstore'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/addfood', [App\Http\Controllers\HomeController::class, 'addfood'])->name('addfood');
    Route::get('/detailstore', [App\Http\Controllers\HomeController::class, 'detailstore'])->name('detailstore');
    Route::get('/storeorder', [App\Http\Controllers\HomeController::class, 'storeorder'])->name('storeorder');
    Route::get('/historyorder', [App\Http\Controllers\HomeController::class, 'historyorder'])->name('historyorder');
});
//store add to base
Route::middleware(['auth', 'isstore'])->group(function () {
    Route::post('/addproduct', [App\Http\Controllers\ProductsController::class, 'store'])->name('addproduct');
    Route::post('/updateproduct', [App\Http\Controllers\ProductsController::class, 'storeupdate'])->name('updateproduct');
    Route::post('/productdelete', [App\Http\Controllers\ProductsController::class, 'storedelete'])->name('productdelete');
    Route::get('/productdetail', [App\Http\Controllers\ProductsController::class, 'productdetail'])->name('productdetail');
    Route::post('/datastoreorder', [App\Http\Controllers\ProductsController::class, 'datastoreorder'])->name('datastoreorder');
    Route::post('/acceptorder', [App\Http\Controllers\ProductsController::class, 'acceptorder'])->name('acceptorder');
    Route::get('/successorder', [App\Http\Controllers\ProductsController::class, 'successorder'])->name('successorder');
    Route::post('/cancelorder', [App\Http\Controllers\ProductsController::class, 'cancelorder'])->name('cancelorder');
    Route::post('/dataorderhistory', [App\Http\Controllers\ProductsController::class, 'dataorderhistory'])->name('dataorderhistory');
    Route::post('/historyproductname', [App\Http\Controllers\ProductsController::class, 'historyproductname'])->name('historyproductname');
    Route::post('/historydata', [App\Http\Controllers\ProductsController::class, 'historydataselect'])->name('historydata');
    // Route::post('/addmenu', [App\Http\Controllers\HomeController::class, 'addmenu'])->name('addmenu');
});
// store detail
Route::middleware(['auth', 'isstore'])->group(function () {
    Route::post('/storeupdate', [App\Http\Controllers\StoreController::class, 'storeedit'])->name('storeupdate');
    // Route::post('/addmenu', [App\Http\Controllers\HomeController::class, 'addmenu'])->name('addmenu');
});








// 
Route::get('/addwebfood', [App\Http\Controllers\Controller::class, 'addwebfood'])->name('addwebfood');
Route::get('/querywebfood', [App\Http\Controllers\Controller::class, 'querywebfood'])->name('querywebfood');
Route::post('/addwebfooddata', [App\Http\Controllers\Controller::class, 'addwebfooddata'])->name('addwebfooddata');
// 






// netflix
Route::get('/netflixmilk', [App\Http\Controllers\Controller::class, 'netflixmilk'])->name('netflixmilk');
Route::post('/youtube', [App\Http\Controllers\Controller::class, 'youtube'])->name('youtube');
Route::get('/netflix', [App\Http\Controllers\Controller::class, 'netflix'])->name('netflix');
Route::get('/querynetflix', [App\Http\Controllers\Controller::class, 'querynetflix'])->name('querynetflix');
Route::get('/test', [App\Http\Controllers\Controller::class, 'test'])->name('test');
// 