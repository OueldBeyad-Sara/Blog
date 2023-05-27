<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function aboutMe(){
        return view('front.pages.about');
    }

    public function contact(){
        return view('front.pages.contact');
    }

    public function home(){
        return view('front.pages.home');
    }
}
