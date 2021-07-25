<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
 
use App\Mail\ContactSending;

class PagesController extends Controller
{
    //Contactフォームのページ
    public function contact() {
        return view('pages.contact');
    }
    
    //Contactフォーム メール送信
    public function contact_send(Request $request) {
        //バリデーション
        $request->validate([
            'uname' => 'required',
            'email' => 'required|email',
            'body' => 'required'
        ]);
 
        //メール送信
        $data = [
            'uname' => $request->input('uname'),
            'email' => $request->input('email'),
            'body' => $request->input('body')
        ];
    
        Mail::to(env('MAIL_ADMIN'))->send(new ContactSending($data));
        Mail::to($data['email'])->send(new ContactSending($data));
    
        //リダイレクト
        return view('/welcome')->with('success','お問い合わせを受け付けました。');
    }
    
}
