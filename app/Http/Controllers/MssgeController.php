<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MssgeController extends Controller
{
    public function mssges(){
        return view('messages.index');
    }
}
