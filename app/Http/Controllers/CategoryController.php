<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        // $categories=DB::table('categories')
        //                         ->join('users','categories.user_id','users.id')
        //                         ->select('categories.*','users.name')
        //                         ->latest()
        //                         ->paginate(5);
        $categories=Category::latest()->paginate(5);
        $trash_categories=Category::onlyTrashed()->latest()->paginate(3);
        //dd($categories);
        return view('admin.category.index',compact('categories','trash_categories'));
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

    public function edit(Category $category){

        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request,Category $category){
        $validated =$request->validate(
            ['category_name'=>'required'],
            ['required'=>'請填寫:attribute']
        );
        $validated['user_id']=Auth::user()->id;

        $category->update($validated);
        return redirect()->route('all.category');
    }

    public function delete(Category $category){
        $category->delete($category);
        return redirect()->route('all.category');
    }

    public function restore($id){
        $category=Category::withTrashed()->find($id)->restore();//軟刪除
        return redirect()->route('all.category');
    }

    public function Pdelete($id){
        $category=Category::onlyTrashed()->find($id)->forceDelete();//真實刪除
        return redirect()->route('all.category');
    }

}
