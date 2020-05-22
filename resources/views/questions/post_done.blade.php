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
        <form method="POST" action="{{ action('QuestionController@show') }}">
          @csrf
          <input name="id" type="hidden" value="{{ $question->id }}">
          <button class="display-btn">投稿した質問を見る</button>
        </form>
      </div>
      
@endsection
