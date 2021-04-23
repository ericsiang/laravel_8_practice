<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function upass_index(){
        return view('admin.user.upass');
    }

    public function profile_index(){
        if(Auth::user()){
            $user=User::find(Auth::user()->id);
            return view('admin.user.profile',compact('user'));
        }
    }

    public function profile_store(Request $request){
        $validated=$request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',

            ],
            [
                'required'=>'請輸入:attribute',
                'email'=>'確認email格式',
            ]
        );

        $user=User::find(Auth::user()->id);
        $user->update($validated);

        return redirect()->back()->with(['success'=>'修改完成']);
    }

    public function upass_store(Request $request){
        $validated=$request->validate(
            [
                'current_password'=>'required',
                'password'=>'required|confirmed',

            ],
            [
                'required'=>'請輸入:attribute',
                'confirmed'=>'確認密碼不一致',
            ]
        );

        $hashPass=Auth::user()->password;
        if(Hash::check($request->current_password,$hashPass)){
            $user=User::find(Auth::user()->id);
            $user->update(['password'=>Hash::make($request->password)]);
            Auth::logout();
            return redirect()->route('login')->with(['success'=>'密碼已更換，請重新登入']);
        }else{
            return redirect()->back()->with(['error'=>'Current Password 不正確']);
        }


    }

}
