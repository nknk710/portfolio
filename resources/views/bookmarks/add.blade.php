@extends('layouts.app')

@section('title')
質問をブックマークに追加しました
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ secure_asset('css/question_post.css') }}" type="text/css" />
@endsection


@section('content')

      <div class="container">

        <h1>質問をブックマークに追加しました</h1>
        <form method="POST" action="{{ action('QuestionController@show') }}">
          @csrf
          <input name="id" type="hidden" value="{{ $question->id }}">
          <button class="display-btn">質問に戻る</button>
        </form>
      </div>
      
@endsection
