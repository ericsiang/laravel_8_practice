<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $abouts=About::latest()->paginate(5);
        //dd($abouts);
        return view('admin.about.index',compact('abouts'));
    }

    public function store(Request $request){
        $validated =$request->validate(
            [
                'title'=>'required',
                'short_desc'=>'required',
                'long_desc'=>'required',
            ],
            ['required'=>'請填寫:attribute']
        );

        //dd($request);
        $about=About::create($validated);
        //dd($about);
        return redirect()->route('all.about');
    }

    public function edit(About $about){

        return view('admin.about.edit',compact('about'));
    }

    public function update(Request $request,About $about){
        $validated =$request->validate(
            [
                'title'=>'required',
                'short_desc'=>'required',
                'long_desc'=>'required',
            ],
            ['required'=>'請填寫:attribute']
        );


        $about->update($validated);
        return redirect()->route('all.about');
    }

    public function delete(About $about){
        $about->delete($about);
        return redirect()->route('all.about');
    }


}
