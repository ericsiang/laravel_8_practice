<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class SliderController extends Controller
{
    public function index(){
        $sliders=Slider::latest()->paginate(5);
        //$trash_sliders=Slider::onlyTrashed()->latest()->paginate(3);
        //dd($categories);
        return view('admin.slider.index',compact('sliders'));
    }

    public function store(Request $request){
        $validated =$request->validate(
            [
                'title'=>'required',
                'desc'=>'required',
                'img'=>'mimes:jpg,jpeg,png'
            ],
            [
                'required'=>'請填寫:attribute',
                'img.required'=>'請上傳圖片',
                'img.mimes'=>'圖片格式為jpg,jpeg,png'
            ]
        );
        //dd($validated);
        $slider_img=$request->file('img');
        $img_name=hexdec(uniqid()).'.'.strtolower($slider_img->getClientOriginalExtension());

        //未使用套件上傳圖片
        //$last_img='img/slider/';
        //$slider_img->move($last_img,$img_name);

        //使用Image套件上傳圖片
        $store_src='img/slider';
        if(!is_dir($store_src)){
            mkdir($store_src, 0777, true);
        }
        $last_src= $store_src.'/'.$img_name;
        //dd($last_src);
        Image::make($slider_img)->resize(1600,900)->save($last_src);

        $validated['img']=$last_src;
        $Slider=Slider::create($validated);
        //dd($category);
        return redirect()->route('all.slider');
    }

    public function edit(Slider $slider){
        return view('admin.slider.edit',compact('slider'));
    }

    public function update(Request $request,Slider $slider){
        $validated =$request->validate(
            [
                'title'=>'required',
                'desc'=>'required',
                'img'=>'mimes:jpg,jpeg,png'
            ],
            [
                'required'=>'請填寫:attribute',
                'img.mimes'=>'圖片格式為jpg,jpeg,png'
            ]
        );

        $slider_img=$request->file('img');
        if($slider_img){
            $old_slider_img=$request->old_slider_img;
            if(file_exists($old_slider_img)){
                unlink($old_slider_img);
            }
            $img_name=hexdec(uniqid()).'.'.strtolower($slider_img->getClientOriginalExtension());
            $store_src='img/slider';
            $last_src= $store_src.'/'.$img_name;
            //dd($last_src);
            if(!is_dir($store_src)){
                mkdir($store_src, 0777, true);
            }
            $slider_img->move($store_src,$img_name);
            $validated['img']=$last_src;
        }

        $slider->update($validated);

        return redirect()->route('all.slider');
    }

    public function delete($id){
        $slider=Slider::find($id);
        $old_slider_img=$slider->slider_img;
        if(file_exists($old_slider_img)){
            unlink($old_slider_img);
        }

        Slider::find($id)->delete();
        return redirect()->route('all.slider');
    }

    public function multipic(){
        $multipics=Multipic::latest()->paginate(5);
        return view('admin.multipic.index',compact('multipics'));
    }

    public function multipicStore(Request $request){
        $validated =$request->validate(
            [
                'img.*'=>'required|mimes:jpg,jpeg,png'
            ],
            [

                'img.*.required'=>'請上傳圖片',
                'img.*.mimes'=>'圖片格式為jpg,jpeg,png'
            ]
        );

        foreach($validated['img'] as $multi_img){
            $img_name=hexdec(uniqid()).'.'.strtolower($multi_img->getClientOriginalExtension());

            //使用Image套件上傳圖片
            $store_src='img/multipic/'.$img_name;
            Image::make($multi_img)->resize(300,200)->save($store_src);
            $Multipics=Multipic::create([
                'img'=>$store_src,
                'created_at'=>Carbon::now()
            ]);
        }

        return redirect()->route('all.multipic');

    }
}
