<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class BlogController extends Controller
{
    public function index(){
        $posts=Post::where('status',1)->orderBy('created_at','desc')->paginate(4);

        return view('front.home',compact('posts'));
    }

    public function singlePage($id){
        $post=Post::findOrFail($id);
        $tags=Tag::all();
        return view('front.single_page',compact('post','tags'));
    }
}
