<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function create(){
        return view('auth.tag.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:tags,name'
        ]);

            Tag::create([
                'name'=>$request->name,
            ]);
            return redirect()->route('tag.create')->with('success','Successfully tag added.');


    }

    public function list(){
        $tags=Tag::paginate(5);
        return view('auth.tag.list',compact('tags'));
    }

    public function delete($id){
        $tag=Tag::findOrFail($id);
        $tag->delete();
        return redirect()->route('tag.list')->with('success','Successfully tag Deleted.');

    }

    public function edit($id){
        $tag=Tag::findOrFail($id);
        return view('auth.tag.edit',compact('tag'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
        ]);

            $tag=Tag::findOrFail($id);

            $tag->update([
                'name'=>$request->name,
            ]);
            return redirect()->route('tag.list')->with('success','Successfully tag Updated.');

        }

 }
