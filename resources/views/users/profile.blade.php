@extends('layouts.app')

@section('title')
アカウントの作成が完了しました
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ secure_asset('css/profile.css') }}" type="text/css" />
@endsection


@section('content')
      <div class="container">
  
        <div class="profile">
          <div class="title">
            <h1>プロフィール</h1>
            @if(Auth::id() === $profile->id)
              <a href="{{ route('edit') }}">プロフィールを変更</a> 
            @endif
          </div>

          <div class="img">
              @if ($profile->profile_image)
                  <img class="profile_img" src="{{ secure_asset('storage/image/' . $profile->profile_image) }}">
              @else
                  <img class="profile_img" src="{{ secure_asset('image/ja_2016_01.webp') }}" name="profile_image" alt="">
              @endif
          </div>           

          <div class="name">
            <p>{{ $profile->user_name }}</p>  <!--名前が表示されるようにする-->
          </div>
          

          <div class="introduction">
            <p>{{ $profile->introduction }}</p>
          </div>

          


          <div class="question">
              <a href="{{ action('QuestionController@private_question', ['id' => $profile->id]) }}">質問一覧</a>
          </div>
          
          @if(Auth::id() === $profile->id)
            <div class="bookmark">
              <a href="{{ action('BookmarkController@index') }}">ブックマークした質問一覧</a> 
            </div>
          @endif
  
        </div>
      </div>


@endsection
