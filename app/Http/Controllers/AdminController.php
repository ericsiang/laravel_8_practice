<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function logout(){
        Auth::logout('user');
        return redirect()->route('login');
    }
}
