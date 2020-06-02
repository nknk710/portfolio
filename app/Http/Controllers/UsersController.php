<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Question;
use App\Models\Relation;
use Storage;

class UsersController extends Controller
{
    public function add(){
        return view('users.register_done');
    }
    
    public function index(Request $request){
      
      $profile = User::find($request->id);
      return view('users.profile', ['profile' => $profile]);
    }
    
    public function my_profile()
    {
      $id = Auth::id();
      $profile = User::find($id);
      $user = Auth::user();
      $user['admin'] = true;
      $user->save();
      return view('users.profile', ['profile' => $profile]);
    }
    
    public function edit(){
        $id = Auth::id();
        $profile = User::find($id);
        return view('users.profile_edit',['profile' => $profile]);
    }
    
    public function update(Request $request){
      // Validationをかける
      $this->validate($request, User::$rules);
      // News Modelからデータを取得する
      $user = User::find($request->id);
      // 送信されてきたフォームデータを格納する
      $user_form = $request->all();
      
      if (isset($user_form['profile_image'])) {
        // $path = $request->file('profile_image')->store('public/image');
        // $user->profile_image = basename($path);
        $path = Storage::disk('s3')->putFile('/',$user_form['profile_image'],'public');
        $user->profile_image = Storage::disk('s3')->url($path);
        unset($user_form['profile_image']);
      } elseif (isset($request->remove)) {
        $user->profile_image = null;
        unset($user_form['remove']);
      }
      unset($user_form['_token']);
      
      // 該当するデータを上書きして保存する
      $user->fill($user_form)->save();
      
      return view('users.profile_set', ['user' => $user]);
    }
    
    
}
