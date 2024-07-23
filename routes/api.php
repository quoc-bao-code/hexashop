<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::get('/product',[ProductsController::class,'product'])->name('product');
    Route::get('/productman',[ProductsController::class,'productman'])->name('productman');
    Route::get('/productwomen',[ProductsController::class,'productwomen'])->name('productwomen');
    Route::get('/productkid',[ProductsController::class,'productkid'])->name('productkid');
    Route::get('/category',[ProductsController::class,'category'])->name('category');
   Route::get('/productaddel/{id}',[ProductsController::class,'productaddel'])->name('productaddel');
   Route::get('/productadupdateform/{id}',[ProductsController::class,'productadupdateform'])->name('productadupdateform');
   Route::post('/productadupdate',[ProductsController::class,'productadupdate'])->name('productadupdate');
   Route::post('/productad',[ProductsController::class,'productads'])->name('productads');
   Route::get('/updateproductad',[ProductsController::class,'updateproductad'])->name('updateproductad');
