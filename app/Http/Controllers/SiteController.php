<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class SiteController extends Controller
{
    public function products(){
        return view('welcome')->with('posts',Post::all());
    }
}
