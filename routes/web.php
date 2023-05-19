<?php

use App\Http\Controllers\cartController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\productController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get("/visapay",function(){
    return view("buyWithVisa");
});

Route::post("/visapay",function(Request $request){
    $formFields = $request->validate([
        "card_number"=>"required",
        "name"=>"required",
        "phone_number"=>"required"
    ]);
    // Get the cart items from the session
    $cartItems = session('cart');
    Session::forget('cart');
    return view("pdf.visaCard",[
        "cartItems"=>$cartItems,
        "formFields"=>$formFields
    ]);
});

Route::get("/bankpay",function(){
    return view("buyWithBank");
});

Route::post("/bankpay",function(Request $request){
    $formFields = $request->validate([
        "name"=>"required",
        "phoneNumber"=>"required",
        "address"=>"required"
    ]);
    // Get the cart items from the session
    $cartItems = session('cart');
    Session::forget('cart');
    return view("pdf.cart",[
        "cartItems"=>$cartItems,
        "formFields"=>$formFields
    ]);
});

Route::get('/',[productController::class,"index"]);

Route::get("/register",[userController::class,"register"]);

Route::get("/login",[userController::class,"login"]);

Route::post("/register",[userController::class,"store"]);

Route::post("/logout",[userController::class,"logout"]);

Route::post("/login",[userController::class,"authenticate"]);

Route::post("/cart/store",[cartController::class,"store"]);

Route::get("/cart",[cartController::class,"index"]);

Route::get("/cartItems",[cartController::class,"cartItems"]);

Route::delete("cart/destroy",[cartController::class,"destroy"]);

Route::get("/cart/increase/{product_id}",[cartController::class,"increase"]);

Route::get("/cart/info",[cartController::class,"info"]);

Route::get("/cart/decrease/{product_id}",[cartController::class,"decrease"]);

Route::get("/token",[cartController::class,"token"]);

Route::get("/comment/{product_id}",[CommentsController::class,"index"]);

Route::post("/comment/create",[CommentsController::class,"create"])->middleware("auth");


Route::get("/comment",[CommentsController::class,"index"]);
