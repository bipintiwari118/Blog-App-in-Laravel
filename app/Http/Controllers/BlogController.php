<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use App\Models\PostTag;

class BlogController extends Controller
{
    public function index(){
        $posts=Post::where('status',1)->orderBy('created_at','desc')->paginate(4);

        return view('front.home',compact('posts'));
    }

    public function singlePage($id){
        $post=Post::findOrFail($id);
        $comments=Comment::where('post_id',$post->id)->paginate(4);
        $tags=$post->tags;
        $latestPosts = Post::latest()->take(3)->get();
        return view('front.single_page',compact('post','tags','comments','latestPosts'));
    }
}
