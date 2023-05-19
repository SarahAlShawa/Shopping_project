<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productController
{
    public function index(Request $request){
        $products = product::all();
        if($name = $request->input("search")){
            $products = DB::table('products')
            ->where('name', 'like', '%' . $name . '%')
            ->get();
        }
        return view("welcome",[
            "products"=>$products
        ]);
    }

    public function view(Product $product){
        return view("comments",["product"=>$product]);
    }

}
