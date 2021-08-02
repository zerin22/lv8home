<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('homepage');
    }

    public function aboutUs(){
        return view('about');
    }

    public function contactUs(){
        return view('contact');
    }

    public function blog($category, $id, $title, $discription)
    {
        return view('blog', compact(['category', 'id', 'title', 'discription']));
    }
}
