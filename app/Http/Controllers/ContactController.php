<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function add()
    {
        return view('contacts.create');
    }
    
    public function create(Request $request)
    {
        //内容をdbに格納する記述
        // Varidationを行う
      $this->validate($request, Contact::$rules);
      $contact = new Contact;
      $form = $request->all();


      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);

      // データベースに保存する
      $contact->fill($form);
      $contact->save();
        
      return view('contacts.contact_done');
    }
    
    public function index()
    {
        if(Auth::user()->admin){
            $contacts = Contact::orderBy('created_at','desc')->paginate(10);
        }else{
            $contacts = null;
        }
        return view('contacts.index', ['contacts' => $contacts]);
    }
    
}