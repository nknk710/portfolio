@extends('layouts.app')

@section('title')
プロフィール設定
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ secure_asset('css/profile_edit.css') }}" type="text/css" />
@endsection


@section('content')

    <div class="container">
  
        <div class="profile">
          
          <div class="title">
            <h1>プロフィール設定</h1>
          </div>
          <form method="POST" action="{{ route('profile_set') }}" enctype="multipart/form-data">
              @csrf
            <input id="" name="id" type="hidden" value="{{ $profile->id }}">  
              
            <div class="img">
              @if ($profile->profile_image)
                  <img class="profile_img" src="{{ secure_asset('storage/image/' . $profile->profile_image) }}"><br>
              @else
                  <img class="profile_img" src="{{ secure_asset('image/ja_2016_01.webp') }}" name="profile_img" alt=""><br>
              @endif
              <label name="profile_image" for="profile_image">画像設定</label>
              <input type="file" class="form-control-file" name="profile_image">
            </div>
  
            <div class="user">
              <p>ユーザーネーム</p>
              <input class="name_box" type="text" name="user_name" value="{{ $profile->user_name }}">
            </div>
            @if (count($errors) > 0)
              <ul>
                @foreach($errors->all() as $e)
                  <li>※ユーザーネームを入力してください</li>
                @endforeach
              </ul>
            @endif
    
            <div class="introduction">
              <p>自己紹介</p>
              <textarea name="introduction" cols="30" rows="10" placeholder="簡単な自己紹介と、自分が持つスキルや言語について書いてみましょう。">{{ $profile->introduction }}</textarea>
            </div>
  
            <button class="send-btn">プロフィールを設定する</button>
  
          </form>
        </div>
      </div>

@endsection
