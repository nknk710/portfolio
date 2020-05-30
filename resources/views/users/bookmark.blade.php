@extends('layouts.app')

@section('title')
ブックマーク一覧
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ secure_asset('css/bookmark.css') }}" type="text/css" />
@endsection


@section('content')

    <div class="container">

      <div class="title">
        <h1>ブックマークした質問一覧</h1>
      </div>
  
      <div class="question-list">
          
        @foreach($bookmarks as $bookmark)
        
            <div class="search-question">
              <div class="type">
                    @if ( $bookmark->question->best_answer === null )
                      <span class="unsolved">回答受付中</span>
                    @else
                      <span class="solution">解決済み</span>
                    @endif
                <span class="question-category">{{ $bookmark->question->category }}</span>
              </div>
              <div class="question-title">
                  <a href="{{ action('QuestionController@show', ['id' => $bookmark->question_id]) }}">{{ $bookmark->question->title }}</a>
              </div>
              <div class="bookmark">
                <form method="GET" action="{{ action('BookmarkController@delete') }}">
                  @csrf
                  <input name="id" type="hidden" value="{{ $bookmark->question_id }}">
                  <button class="delete-btn">ブックマークから削除</button>
                </form>
              </div>
            </div>
        @endforeach
        
      
      </div>
      
      @if(count($bookmarks)<=0)
        <p class="null">ブックマークされた質問がありません</p>
      @endif
      <div class="paginate">
        {{ $bookmarks->links() }}
      </div>
      
    </div>

      
@endsection
