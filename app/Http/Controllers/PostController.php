<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('auth.post.create',compact('categories','tags'));
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required',
            'category_id'=>'required',
            'user_id'=>'required',
            'status'=>'required',
            'tags'=>'required'
        ]);

        DB::transaction(function () use($request){

            $post = Post::create([
                'title'=>$request->title,
                'description'=>$request->description,
                'category_id'=>$request->category_id,
                'user_id'=>$request->user_id,
                'status'=>$request->status,
            ]);

            foreach($request->tags as $tag){
                $post->tags()->attach($tag);
            }

        });

        return redirect()->route('post.list')->with('success','Post Created Successfully.');


    }


    public function list(){
        $posts = Post::with('tags','category')->paginate(8);

        return view('auth.post.list',compact('posts'));
    }


    public function delete($id){
        $post = Post::findOrFail($id);

        $post->tags()->detach($post->tags);
        $post->delete();

        return redirect()->route('post.list')->with('success','Post Deleted Successfully.');
    }


    public function edit($id){
        $post=Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('auth.post.edit',compact('post','categories','tags'));
    }

    public function update(Request $request , $id){

        $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required',
            'category_id'=>'required',
            'user_id'=>'required',
            'status'=>'required',
            'tags'=>'required'
        ]);

        $post=Post::findOrFail($id);
        $post->tags()->sync($request->tags);
       $post->update([
        'title'=>$request->title,
        'description'=>$request->description,
        'category_id'=>$request->category_id,
        'user_id'=>$request->user_id,
        'status'=>$request->status,
       ]);

       return redirect()->route('post.list')->with('success','Post Updated Successfully.');
    }
}
