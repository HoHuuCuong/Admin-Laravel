<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function shop()
    {
        return view('shop');
    }
}


?>