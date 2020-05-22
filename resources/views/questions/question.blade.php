@extends('layouts.app')

@section('title')
{{ $question->title }}
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ secure_asset('css/question.css') }}" type="text/css" />
@endsection


@section('content')

        <div class="container">
          <div class="question-content">
            <div class="top-contents">
              <div class="question-head">
               <h1>{{ $question->title }}</h1>
              </div>
            </div>



            <div class="main-content">

              <div class="question">
                <div class="quesrion-user user">
                  @if ($question->profile_image)
                    <img class="profile_img" src="{{ secure_asset('storage/image/' . $profile->profile_image) }}">
                  @else
                    <img class="profile_img" src="{{ secure_asset('image/ja_2016_01.webp') }}" name="profile_image" alt="">
                  @endif
                  
                  <a href="#">{{ $question->user->user_name }}</a>
                  
                </div>  
                <div class="qustion-body">
                  <p>{{ $question->body }}</p>
  
                  <div class="post-day">
                    <span class="solution">
                      @if ( $question->best_answer === null )
                        回答受付中
                      @else
                        解決済み
                      @endif
                    </span>
                    
                    <span class="question-category">{{ $question->category }}</span><br>
                    <span>投稿日時</span>
                    <p class="created_at">{{ $question->created_at->format('Y/m/d') }}</p>
                  </div>
                </div>
  
              </div>
              <!-- <button class="bookmark">この質問をブックマークに追加</button>
                <button class="bookmark">この質問をブックマークから削除</button> -->
                <form method="POST" action="{{ action('QuestionController@edit') }}">
                  @csrf
                  <input name="id" type="hidden" value="{{ $question->id }}">
                  <button class="bookmark-btn">質問を編集する</button>
                </form>
                <form method="GET" action="{{ action('QuestionController@delete') }}">
                  @csrf
                  <input name="id" type="hidden" value="{{ $question->id }}">
                  <button class="delete-btn">質問を削除する</button>
                </form>
              
              <div class="answer-post">
                <h3>回答投稿</h3>
                <form action="{{ action('AnswersController@create') }}" method="POST">
                    @csrf
                  <textarea name="answer" id="" cols="30" rows="10"></textarea>
                  <input name="id" type="hidden" value="{{ $question->id }}">
                  <button class="post-btn">回答を投稿する</button>
                </form>
              </div>

              <div class="answer-list">
                <div class="answer-head">
                 <h3>回 答 一 覧</h3> 
                </div>
                
                @foreach($answers as $answer)
                  <div class="answer">

                    <div class="answer-content">
                      @if($question->best_answer !== null)
                        <span class="best-answer">ベストアンサー</span>
                      @endif
                       <p>{{ $answer->answer }}</p>
                    </div>
                    <div class="answer-user user">
                      <img class="profile_img" src="{{ secure_asset('image/ja_2016_01.webp') }}" alt="">
                      <a href="#">{{ $answer->user->user_name }}</a>
                    </div>
                    <div class="best-answer-set">
                      <button class="set-btn">この回答をベストアンサーに設定</button>
                    </div>
                  </div>
                @endforeach

                

              </div>

            </div>
          </div>
  
        </div>
  


@endsection
