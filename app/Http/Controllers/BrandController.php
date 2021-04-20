<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{
    public function index(){
        $brands=Brand::latest()->paginate(5);
        //$trash_brands=Brand::onlyTrashed()->latest()->paginate(3);
        //dd($categories);
        return view('admin.brand.index',compact('brands'));
    }

    public function store(Request $request){
        $validated =$request->validate(
            [
                'brand_name'=>'required',
                'brand_img'=>'required|mimes:jpg,jpeg,png'
            ],
            [
                'brand_name.required'=>'請填寫:attribute',
                'brand_img.required'=>'請上傳圖片',
                'brand_img.mimes'=>'圖片格式為jpg,jpeg,png'
            ]
        );

        $brand_img=$request->file('brand_img');
        $img_name=hexdec(uniqid()).'.'.strtolower($brand_img->getClientOriginalExtension());

        //未使用套件上傳圖片
        //$last_img='img/brand/';
        //$brand_img->move($last_img,$img_name);

        //使用Image套件上傳圖片
        $store_src='img/brand/'.$img_name;
        Image::make($brand_img)->resize(300,200)->save($store_src);

        $validated['brand_img']=$store_src;
        $Brand=Brand::create($validated);
        //dd($category);
        return redirect()->route('all.brand');
    }

    public function edit(Brand $brand){
        return view('admin.brand.edit',compact('brand'));
    }

    public function update(Request $request,Brand $brand){
        $validated =$request->validate(
            [
                'brand_name'=>'required',
                'brand_img'=>'mimes:jpg,jpeg,png'
            ],
            [
                'brand_name.required'=>'請填寫:attribute',
                'brand_img.required'=>'請上傳圖片',
                'brand_img.mimes'=>'圖片格式為jpg,jpeg,png'
            ]
        );

        $brand_img=$request->file('brand_img');
        if($brand_img){
            $old_brand_img=$request->old_brand_img;
            unlink($old_brand_img);
            $img_name=hexdec(uniqid()).'.'.strtolower($brand_img->getClientOriginalExtension());
            $last_img='img/brand/';
            $brand_img->move($last_img,$img_name);
            $validated['brand_img']=$last_img.$img_name;
        }

        $brand->update($validated);

        return redirect()->route('all.brand');
    }

    public function delete($id){
        $brand=Brand::find($id);
        $old_brand_img=$brand->brand_img;
        unlink($old_brand_img);

        Brand::find($id)->delete();
        return redirect()->route('all.brand');
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
