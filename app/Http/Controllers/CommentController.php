<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function storeComment(Request $request){
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('error',"Please login or register first.");
        }

        $request->validate([
            'post_id'=>'required|exists:posts,id',
            'comment'=>'required',
        ]);

        Comment::create([
            'user_id'=>Auth::user()->id,
            'post_id'=>$request->post_id,
            'comment'=>$request->comment
        ]);

        return redirect()->back()->with('success',"Successfully comment on this post");


    }



}
