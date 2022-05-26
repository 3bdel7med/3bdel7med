<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect(){
if(Auth::id()){
    if (Auth::user()->usertype=="0"){
        return view('dashboard')->with('success','login succesful!');;
    }
    else{
        return view('admin.home')->with('success','ahello in your dashboard');


    }
}
else{
    return redirect()->back();
}
    }
}
