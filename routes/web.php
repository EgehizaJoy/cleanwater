<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\productscontroller;


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
//register a user
Route::post("register",[App\Http\Controllers\UserController::class,'register']);

//login
Route::post("login",[App\Http\Controllers\UserController::class,'login']);


//logout
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/');
});

//
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Route::get('customer_orders', [App\Http\Controllers\admin\CustomerOrders::class, 'userorder']);

Route::get('thankyou', function () {
    return view('thankyou');
});

//dashboard
Route::get('dashboard', 'App\Http\Controllers\admin\dashboard@dashboard');


//products, categories, discount and inventory in the admin panel side
Route::resource('/admin-products',productscontroller::class);

Route::post("/stock",[productscontroller::class,'stock']);
Route::post('/stock_qty', 'App\Http\Controllers\admin\InventoryController@update_qty');

Route::get("/stocks",[productscontroller::class,'view_stock']);

Route::post("/discount",[productscontroller::class,'discount']);

Route::post("/category",[productscontroller::class,'category']);


Route::get("/removeproduct/{id}",[App\Http\Controllers\admin\productscontroller::class,'destroy']); 


Route::get("/removeqty/{id}",[App\Http\Controllers\admin\InventoryController::class,'destroy']); 
//products in the end user side
Route::get("products",[App\Http\Controllers\Product_Controller::class,'index']);

Route::get("/detail/{id}", [App\Http\Controllers\Product_Controller::class, 'detail'])->name('details');

//cart


Route::get("/cart",[App\Http\Controllers\CartList::class,'cart']);

Route::post('/cart', 'App\Http\Controllers\CartController@store')->name('cart.store');

Route::get("/removecart/{id}",[App\Http\Controllers\CartList::class,'removeCart']); 

Route::post('updatecart', 'App\Http\Controllers\CartController@update');
Route::post('minuscart', 'App\Http\Controllers\CartController@minus');
//Route::patch('/cart/{product}', 'App\Http\Controllers\CartController@update')->name('cart.update');

//checkout
Route::get("checkout",[App\Http\Controllers\CartList::class,'checkoutlist']);

//orders
Route::post("/order",[App\Http\Controllers\OrderController::class,'store']);



Route::post('contact-form',[App\Http\Controllers\AddressController::class, 'store']);

Route::get('orders', 'App\Http\Controllers\admin\CustomerOrders@orders');


//invoices tests
Route::get('invoiceindex', function () {
    return view('invoiceindex');
});

Route::get('createinvoice', 'App\Http\Controllers\admin\InvoiceController@index');


Route::get('quotation-items', function () {

    return view('createquotation');

});

//quotations

//Route::post("quote",[App\Http\Controllers\admin\QuotationController::class,'index']);

//Route::get('quotation', 'App\Http\Controllers\admin\QuotationController@index');


Route::post("orderid",[App\Http\Controllers\admin\QuotationController::class,'orderid']);

Route::post("/quotation",[App\Http\Controllers\admin\QuotationController::class,'store']);

Route::get('quotation', 'App\Http\Controllers\admin\QuotationController@view');

Route::post("quote",[App\Http\Controllers\admin\QuotationController::class,'viewquote']);

Route::get("/removequote/{id}",[App\Http\Controllers\admin\QuotationController::class,'destroy']); 

//invoice

Route::post("invoiceid",[App\Http\Controllers\admin\InvoiceController::class,'invoiceid']);

Route::post("/invoice",[App\Http\Controllers\admin\InvoiceController::class,'store']);

Route::get('invoice', 'App\Http\Controllers\admin\InvoiceController@index');

Route::post("view",[App\Http\Controllers\admin\InvoiceController::class,'viewinvoice']);

Route::post("receipt",[App\Http\Controllers\admin\InvoiceController::class,'receipt']);

Route::get("/removeinvoice/{id}",[App\Http\Controllers\admin\InvoiceController::class,'destroy']); 

Route::get('error', function () {
    return view('error');
});

//get users
Route::get('user', 'App\Http\Controllers\admin\UserController@index');

Route::get("/removeuser/{id}",[App\Http\Controllers\admin\UserController::class,'destroy']); 



Route::patch('update-cart', [App\Http\Controllers\CartController::class, 'updates'])->name('update.cart');


//paypal
Route::post('charge', 'App\Http\Controllers\PaymentController@charge');
Route::get('success', 'App\Http\Controllers\PaymentController@success');
Route::get('error', 'App\Http\Controllers\PaymentController@error');