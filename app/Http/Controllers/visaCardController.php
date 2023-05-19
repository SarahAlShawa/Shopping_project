<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class visaCardController extends Controller
{
    public function visapay(){
        return view("buyWithVisa");
    }
}
