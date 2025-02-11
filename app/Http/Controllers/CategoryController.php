<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create(){
        return view('auth.category.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        Category::create([
            'name'=>$request->name
        ]);
        return redirect()->route('category.create')->with('success','Successfully category added.');

    }

    public function list(){
        $categories=Category::paginate(5);
        return view('auth.category.list',compact('categories'));
    }

    public function delete($id){
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.list')->with('success','Successfully category Deleted.');

    }

    public function edit($id){
        $category=Category::findOrFail($id);
        return view('auth.category.edit',compact('category'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
        ]);

        $name=Category::where('name',$request->name)->first();
        if($name){
            return redirect()->back()->with('error','Category already exsits.');
        }else{
            $category=Category::findOrFail($id);

            $category->update([
                'name'=>$request->name,
            ]);
            return redirect()->route('category.list')->with('success','Successfully category Updated.');

        }


    }
}
