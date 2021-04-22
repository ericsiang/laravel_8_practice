<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $brands=Brand::latest()->get();
        $abouts=About::latest()->get();
        $multipics=Multipic::latest()->get();
        return view('front.index',compact('brands','abouts','multipics'));
    }
}
