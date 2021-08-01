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
}
