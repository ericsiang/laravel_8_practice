<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function  Admin_index_form(){
        $contact_forms=ContactForm::latest()->paginate(5);
        //dd($contacts);
        return view('admin.contact.msg',compact('contact_forms'));
    }

    public function index(){
        $contact=Contact::first();
        //dd($contact);
        return view('front.contact.index',compact('contact'));
    }

    public function Admin_index(){
        $contacts=Contact::latest()->paginate(5);
        //dd($contacts);
        return view('admin.contact.index',compact('contacts'));
    }

    public function Admin_store(Request $request){
        $validated =$request->validate(
            [
                'add'=>'required',
                'email'=>'required|email',
                'phone'=>'required|regex:/^09[0-9]{8}$/',
            ],
            [
                'required'=>'請填寫:attribute',
                'regex'=>'請輸入正確的手機號碼'
            ]
        );

        //dd($request);
        $contact=Contact::create($validated);
        //dd($contact);
        return redirect()->route('all.contact');
    }

    public function Admin_edit(Contact $contact){

        return view('admin.contact.edit',compact('contact'));
    }

    public function Admin_update(Request $request,Contact $contact){
        $validated =$request->validate(
            [
                'add'=>'required',
                'email'=>'required|email',
                'phone'=>'required|regex:/^09[0-9]{8}$/',
            ],
            [
                'required'=>'請填寫:attribute',
                'regex'=>'請輸入正確的手機號碼'
            ]
        );


        $contact->update($validated);
        return redirect()->route('all.contact');
    }

    public function Admin_delete(Contact $contact){
        $contact->delete($contact);
        return redirect()->route('all.contact');
    }

    public function contactForm(Request $request){
        $validated =$request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'subject'=>'required',
                'msg'=>'required',
            ],
            [
                'required'=>'請填寫:attribute',
                'email'=>'請輸入正確的Email'
            ]
        );

        $contact_form=ContactForm::create($validated);
        //dd($contact);
        return redirect()->route('contact')->with(['success'=>'成功填寫']);
    }


}
