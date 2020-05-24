@extends('layouts.app')

@section('title')
プロフィール設定
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ secure_asset('css/profile_set.css') }}" type="text/css" />
@endsection


@section('content')
    <div class="container">

      <h1>プロフィールの設定が完了しました</h1>
      <form action="{{ route('profile') }}" method="GET">
        <input name="id" type="hidden" value="{{ $user->id }}">
        <button class="show-btn" onclick="location.href='/users/profile'">マイプロフィールを見る</button>
      </form>
      
      <button class="home-btn" onclick="location.href='/'">トップに戻る</button>


    </div>

@endsection
