@extends('layouts.app')

@section('title')
質問の投稿が完了しました
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ secure_asset('css/question_post.css') }}" type="text/css" />
@endsection


@section('content')

      <div class="container">

        <h1>質問の投稿が完了しました</h1>
        <form method="GET" action="{{ action('QuestionController@show') }}">
          @csrf
          <input id="" name="id" type="hidden" value="{{ $question }}">
          <button class="display-btn">投稿した質問を見る</button>
        </form>
      </div>
      
@endsection
