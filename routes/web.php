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

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/process-login', 'LoginController@processlogin')->name('processlogin');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('auth/google', 'GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');
Route::get('/password', 'GoogleController@password')->name('password');
Route::post('/process/password', 'GoogleController@process')->name('processpassword');

Route::get('/register', 'LoginController@reg')->name('register');
Route::post('/process-register', 'LoginController@processreg')->name('processregister');



Route::middleware('auth:web')->group(function () {
    Route::get('/main', 'UserController@index')->name('main');


    Route::get('/profile/detail', 'UserController@profiledetail')->name('detailprofile');


    Route::post('/add/detail', 'UserController@adddetail')->name('adddetail');

    Route::get('/product/all', 'ProductsController@index')->name('allproduct');
    Route::get('/detail/product/{id}', 'ProductsController@detail')->name('details');
    Route::get("/create/request", "ProductsController@create_request");

    Route::get('/keranjang', "CartController@index");
    Route::post('/keranjang', "CartController@index");
    Route::post("/update/cart/{id}", "CartController@update");
    Route::get("/cart/delete/{id}", "CartController@delete");
    Route::get("/add/cart/{id}", "CartController@addtocart");
    Route::get('/getCity/ajax/{id}', 'CartController@getCitiesAjax');
    Route::post('/address/create', 'CartController@createaddress');
    Route::post('/cek_ongkir', 'CartController@ongkir');
    Route::post('/address/update/{id}', 'CartController@edit');

    Route::post('/create-question', 'QuestionController@create');

    Route::post('/checkout', 'CheckoutController@checkout')->name('checkout');
    Route::post('/payment/confirmation', 'PaymentController@confirm')->name('payment');


    Route::get("/ordered", "OrderController@index")->name("order");
    Route::get("/order/detail/{id}", "OrderController@show");
    Route::get('/print/invoice/{id}', 'OrderController@invoice')->name('invoice');


    Route::get("/confirmed", "OrderController@confirmed")->name("confirmed");
    Route::get("/packing", "OrderController@packing")->name("packing");
    Route::get("/sent", "OrderController@sent")->name("sent");
    Route::get('/process/completed/{id}', 'OrderController@completedprocess')->name('processcomplete');
    Route::get('/completed', 'OrderController@completed')->name('completed');
});



Route::middleware('auth:admin')->group(function () {
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');

    //category
    Route::get('/add-category', 'CategoryController@index')->name('addcategory');
    Route::post('/process-category', 'CategoryController@process')->name('processcategory');
    Route::post('/process-edit/category/{id}', 'CategoryController@update');
    Route::delete('/process-delete/category/{id}', 'CategoryController@destroy');

    //product
    Route::get('/product', 'ProductController@index')->name('product');
    Route::get('/add-product', 'ProductController@create')->name('addproduct');
    Route::post('/create-product', 'ProductController@store')->name('createproduct');
    Route::get('/preview/specs/{id}', 'ProductController@preview')->name('preview');
    Route::get('/edit/product/{id}', 'ProductController@edit')->name('edit');
    Route::put('/update/product/{id}', 'ProductController@update')->name('update');
    Route::delete('/delete/product/{id}', 'ProductController@destroy')->name('delete');
    Route::post('/answer/create/', 'ProductController@answer');
    Route::get("/eksport/excel", "ProductController@excel_eksport");

    //user-account
    Route::get('/user/list', 'UsersController@index')->name('users');

    //admin-account
    Route::get('/admin/list', 'AdminsController@index')->name('admins');
    Route::post('/admin/create', 'AdminsController@store')->name('createadmins');
    Route::post('/admin/update/{id}', 'AdminsController@update')->name('editadmins');
    Route::put("/admin/block/{id}", "AdminsController@admin_block");
    Route::put("/admin/unblock/{id}", "AdminsController@admin_unblock");

    //productout
    Route::get('/out/ordered', 'TransactionOutController@ordered')->name('outordered');
    Route::get('/out/confirmed', 'TransactionOutController@confirmed')->name('outconfirmed');
    Route::post('/process/payment/{id}', 'TransactionOutController@processpayment')->name('processpayment');
    Route::get('/out/packing', 'TransactionOutController@packing')->name('outpacking');
    Route::post('/process/sent/{id}', 'TransactionOutController@processsent')->name('processsent');
    Route::get('/out/sent', 'TransactionOutController@sent')->name('outsent');


    //history
    Route::get('/history', 'HistoryController@index')->name('history');
    Route::get('/eksport/excel/transaction', 'HistoryController@eksport')->name('transaction');
    Route::get('/print/inv/{id}', 'HistoryController@invoice');
});
