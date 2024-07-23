<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
session_start();
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Auth::routes();
Route::get('/',[HomeController::class,'home'])->name('home');
// Route::middleware(['auth'])->group(function(){
    
    Route::get('/logout',[HomeController::class,'logout'])->name('logout');
    // Route::get('/product',[HomeController::class,'product'])->name('product');
    Route::get('/category/{cataid}/pro',[HomeController::class,'product'])->name('product');
    Route::get('/category/{cataid}/search',[HomeController::class,'search'])->name('search');
    Route::get('/about',[HomeController::class,'about'])->name('about');
    Route::get('/contact',[HomeController::class,'contact'])->name('contact');
    Route::get('/login',[HomeController::class,'login'])->name('login');
    Route::post('/login',[HomeController::class,'userlogin'])->name('userlogin');
    Route::get('/register',[HomeController::class,'register'])->name('register');
    Route::post('/register',[HomeController::class,'userregister'])->name('userregister');
    Route::get('/singleproduct/{id}',[HomeController::class,'singleproduct'])->name('singleproduct');
    Route::get('/profile/{id}',[HomeController::class,'profile'])->name('profile');
    Route::post('/userupdateprofile',[HomeController::class,'userupdateprofile'])->name('userupdateprofile');
    Route::get('/cart',[HomeController::class,'cart'])->name('cart');
    Route::post('/cart/add',[HomeController::class,'addToCart'])->name('cart.add');
    Route::get('/cart/update',[HomeController::class,'updateCart'])->name('cart.update');
    Route::post('/cart/remove',[HomeController::class,'removeFromCart'])->name('cart.remove');
    Route::post('/orderform',[HomeController::class,'orderform'])->name('orderform');
    Route::post('/orderadd',[HomeController::class,'orderadd'])->name('orderadd');
    Route::get('/ordershistory/{id}',[HomeController::class,'ordershistory'])->name('ordershistory');
    Route::post('/orderdetail/{madh}',[HomeController::class,'orderdetail'])->name('orderdetail');
    Route::post('/cart/increase/{id}', [HomeController::class, 'cartup'])->name('cart.increase');
    Route::post('/cart/decrease/{id}', [HomeController::class, 'cartdown'])->name('cart.decrease');

    // Route::middleware(['admin'])->group(function(){

        Route::get('/homead',[AdminController::class,'homead'])->name('homead');
        Route::get('/productad',[AdminController::class,'productad'])->name('productad');
        Route::get('/productaddel/{id}',[AdminController::class,'productaddel'])->name('productaddel');
        Route::get('/productadupdateform/{id}',[AdminController::class,'productadupdateform'])->name('productadupdateform');
        Route::post('/productadupdate',[AdminController::class,'productadupdate'])->name('productadupdate');
        Route::post('/productad',[AdminController::class,'productads'])->name('productads');
        Route::get('/updateproductad',[AdminController::class,'updateproductad'])->name('updateproductad');
        Route::get('/usersad',[AdminController::class,'usersad'])->name('usersad');
        Route::get('/userupdateform/{id}',[AdminController::class,'userupdateform'])->name('userupdateform');
        Route::post('/userupdate',[AdminController::class,'userupdate'])->name('userupdate');
        Route::post('/usersad',[AdminController::class,'usersadd'])->name('usersadd');

    // });
    
       
// });


// admin
