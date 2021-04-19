<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    public function store(Request $request){
        $validated =$request->validate(
            ['category_name'=>'required'],
            ['required'=>'請填寫:attribute']
        );
        $validated ['user_id']=Auth::user()->id;
        //dd($request);
        $category=Category::create($validated );
        //dd($category);
        return redirect()->route('all.category');
    }
}
