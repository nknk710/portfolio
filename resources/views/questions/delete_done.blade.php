@extends('layouts.app')

@section('title')
質問の削除が完了しました
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ secure_asset('css/question_deleted.css') }}" type="text/css" />
@endsection


@section('content')

      <div class="container">

        <h1>質問の削除が完了しました</h1>
        
        <button class="home-btn" onclick="location.href='/'">トップに戻る</button>
      </div>
      
@endsection
