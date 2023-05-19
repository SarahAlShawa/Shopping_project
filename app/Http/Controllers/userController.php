<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class userController extends Controller
{
    public function login(){
        return view("login");
    }
    public function register(){
        return view("register");
    }
    public function store(Request $request){
        $formFields = $request->validate([
            "name"=>["required","min:3"],
            "email"=>["required","email",Rule::unique("users","email")],
            "password"=>["required","confirmed","min:6"]
        ]);
        $formFields["password"] = bcrypt($formFields["password"]);
        $user = User::create($formFields);
        auth()->login($user);
        return redirect("/");
    }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");
    }

    public function authenticate(Request $request){
        $formData = $request->validate([
            "email"=>["required","email"],
            "password"=>"required|min:6"
        ]);
        if(auth()->attempt($formData)){
            $request->session()->regenerate();
            return redirect("/")->with("message","User Logged In Successfully");
        }
        return back()->withErrors(["email"=>"invalid credentials"])->onlyInput("email");
    }


}
