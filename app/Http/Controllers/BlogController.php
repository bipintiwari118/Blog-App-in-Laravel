<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return view('front.home');
    }

    public function singlePage(){
        return view('front.single_page');
    }
}
