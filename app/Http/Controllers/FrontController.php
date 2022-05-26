<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\Specialy;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function doctors(){
        return view('doctors')->with('doctors',Doctor::all());

    }
    public function contact(){
        return view('contact');

    }
    public function news(){
        return view('news');

    }
    public function about(){
        return view('about');

    }


}
