@extends('layouts.app')

@section('title')
お問い合わせ完了
@endsection


@section('page_css')
<link rel="stylesheet" href="{{ asset('css/contact_done.css') }}" type="text/css" />
@endsection

@section('content')
    <div class="container">

        <h1>お問い合わせが完了しました</h1>
        <button class="done-btn" onclick="location.href='/'">ホームに戻る</button>

    </div>
     
@endsection