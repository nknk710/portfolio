@extends('layouts.app')

@section('title')
アカウントの作成が完了しました
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ secure_asset('css/register_done.css') }}" type="text/css" />
@endsection


@section('content')

      <div class="container">

        <h1>アカウントを作成しました</h1>
        <h2>次はプロフィールを設定しましょう</h2>
        <button class="custom-btn" onclick="location.href='/'">プロフィールの設定</button>


      </div>

@endsection
