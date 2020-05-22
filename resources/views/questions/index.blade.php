@extends('layouts.app')

@section('title')
質問一覧
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ secure_asset('css/index.css') }}" type="text/css" />
@endsection


@section('content')

        <div class="container">
  
          <div class="serch-head">
            <div class="title">
              <h1>質問を検索する</h1>
            </div>
            <div class="search-box">

              <form action="{{ action('QuestionController@index') }}" method="get">
                @csrf
                <label for="category">
                  <select class="category" for="category" name="category" id="" size="1" >
                    <option value="Java">Java</option>
                    <option value="C">C</option>
                    <option value=C++"">C++</option>
                    <option valuename="C#">C#</option>
                    <option value="Python">Python</option>
                    <option value="JavaScript">JavaScript</option>
                    <option value="PHP">PHP</option>
                    <option value="Ruby">Ruby</option>
                    <option value="HTML,CSS">HTML,CSS</option>
                    <option value="Swift">Swift</option>
                    <option value="その他">その他</option>
                  </select>
                </label>
                <input type="text" class="box" name="cond_title"value="{{ $cond_title }}"placeholder="キーワードを入力" style="width:400px;height:25px;">
                <button class="search-btn" style="width:70px;height:30px;border-radius:2px;">検索</button>
              </form>

            </div>  
          </div>

          <div class="top-wrapper">
            <div class="result">
              <h2>検索結果</h2>
            </div>
            <div class="sort">
              
            <form action="{{ action('QuestionController@sort') }}" method="get">
              @csrf  
              <input type="hidden" name="question" value="{{ $questions }}">
              <select for="category" name="sort" id="" size="1" >
                <option value="desc">質問日時の新しい順</option>
                <option value="asc">質問日時の古い順</option>
              </select>
              <button class="sort-btn">並び替え</button>
            </form>
            </div>
          </div>

  
          <div class="question-list">
              
              @foreach($questions as $question)
        
                    <div class="search-question">
                      <div class="type">
                        <span class="solution">
                        @if ( $question->best_answer === null )
                          回答受付中
                        @else
                          解決済み
                        @endif
                        </span>
                        <span class="question-category">{{ $question->category }}</span>
                      </div>
                      <div class="question-title">
                          <a href="{{ action('QuestionController@show', ['id' => $question->id]) }}">{{ $question->title }}</a>
                      </div>        
                    </div>         
                @endforeach
  
          </div>
  
  
        </div>

      
@endsection
