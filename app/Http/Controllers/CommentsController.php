<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CommentsController extends Controller
{
    public function create(Request $request){
        $formField = $request->validate([
            "comment"=>["required","max:150"],
        ]);
        $formField["user_id"] = Auth::id();
        comment::create($formField);
        return redirect("/")->with("success","comment added Successfully");
    }

    public function index(){
        $user_id = Auth::id();
        $user = User::find($user_id);
        $comments = Comment::with("User")->get();
        return view("comments",["comments"=>$comments]);

    }
}
