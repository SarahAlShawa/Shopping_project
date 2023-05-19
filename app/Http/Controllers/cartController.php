<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class cartController extends Controller
{
    public function __construct()
    {
        $this->middleware('Illuminate\Session\Middleware\StartSession');
    }

    public function store(Request $request){
       $product = product::find($request->input("product_id"));
       $cart = session()->get('cart', []);
       if(isset($cart[$product->id])){
            return redirect()->back()->with("fail","item is already in the cart");
       }
       $cart[$product->id] = [
           "name"=>$product->name,
           "image"=>$product->image,
           "price"=>$product->price,
           "id"=>$product->id,
           "quantity"=>1
       ];
       session()->put("cart",$cart);
       return redirect('/')->with("success","item is added to the cart");
    }

    public function index(){
        $cart = session()->get("cart");
        $cart_data = $this->getCartInfo();

        return view("cart",["cart"=>$cart,
            "cartData"=>$cart_data
        ]);
    }

    public function getCartInfo(){
        $data["totalCount"] = 0;
        $data["totalPrice"] = 0;
        $cart = session()->get("cart");
        if(isset($cart)){
            foreach ($cart as $oneItem){
                $data["totalCount"] += $oneItem["quantity"];
                $data["totalPrice"] += $oneItem["quantity"] * $oneItem["price"];
            }
        }
        return $data;

    }
    public function info(){
        return response()->json($this->getCartInfo());
    }

    public function cartItems(){
        $data = array();
        $data["numberOfCartItems"] = 0;
        $cart = session()->get("cart");
        if(isset($cart)){
            $data["numberOfCartItems"] = count($cart);
        }
        return response()->json($data);
    }

    public function destroy(Request $request){
        $product_id = $request->input("product_id");
        $cart = session()->get("cart");
        if($cart && isset($cart[$product_id])){
            unset($cart[$product_id]);
            session()->put("cart",$cart);
            return redirect()->back()->with("success","Item removed successfully");
        }
        return redirect()->back()->with("fail","Item doesn't exits in cart!");
    }

    public function increase($product_id){
        $cart = session()->get("cart");
        if($cart && isset($cart[$product_id])){
            $cart[$product_id]["quantity"] += 1;
            session()->put("cart",$cart);
            return "success";
        }
        abort(400, 'The cart contains one item');
    }
    public function  decrease($product_id,Request $request){
        $cart = session()->get("cart");
        if($cart && isset($cart[$product_id])){
            $cart[$product_id]["quantity"] -= 1;
            session()->put("cart",$cart);
            return "success";
        }
        abort(400, 'The cart contains one item');
    }
    public function token(){
        return response()->json(["token"=>csrf_token()]);
    }
}


