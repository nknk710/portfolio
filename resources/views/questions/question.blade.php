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
                  @if ($question->user->profile_image !== null)
                    <img class="profile_img" src="{{ secure_asset('storage/image/' . $question->user->profile_image) }}">
                  @else
                    <img class="profile_img" src="{{ secure_asset('image/ja_2016_01.webp') }}" name="profile_image" alt="">
                  @endif
                  
                  <form action="{{ route('profile') }}" method="GET">
                    @csrf
                    <input name="id" type="hidden" value="{{ $question->user_id }}">
                    <a href="{{ route('profile') }}">{{ $question->user->user_name }}</a>
                  </form>
                  
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
              
              @if(Auth::id() === $question->user_id || Auth::id() === 1)
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
              @else
                @guest
                @else
                  <button class="bookmark">この質問をブックマークに追加</button>
                  <button class="bookmark">この質問をブックマークから削除</button>
                @endguest
              @endif
              
              @if(Auth::id() !== $question->user_id || Auth::id() === 1)
                <div class="answer-post">
                  <h3>回答投稿</h3>
                  <form action="{{ action('AnswersController@create') }}" method="POST">
                      @csrf
                      <textarea name="answer" id="" cols="30" rows="10"></textarea>
                    <input name="id" type="hidden" value="{{ $question->id }}">
                    <button class="post-btn">回答を投稿する</button>
                  </form>
                </div>
              @endif

              <div class="answer-list">
                <div class="answer-head">
                 <h3>回 答 一 覧</h3> 
                </div>
                
                @foreach($answers as $answer)
                  <div class="answer">

                    <div class="answer-content">
                      @if($question->best_answer === $answer->id)
                        <span class="best-answer">ベストアンサー</span>
                      @endif
                       <p>{{ $answer->answer }}</p>
                    </div>
                    <div class="answer-user user">
                      @if ($answer->user->profile_image !== null)
                        <img class="profile_img" src="{{ secure_asset('storage/image/' . $answer->user->profile_image) }}">
                      @else
                        <img class="profile_img" src="{{ secure_asset('image/ja_2016_01.webp') }}" name="profile_image" alt="">
                      @endif
                      <a href="#">{{ $answer->user->user_name }}</a>
                    </div>
                    
                    @if($question->best_answer === null && Auth::id() === $question->user_id)
                      <div class="best-answer-set">
                        <form method="GET" action="{{ action('AnswersController@add') }}">
                          @csrf
                          <input name="id" type="hidden" value="{{ $answer->id }}">
                          <button class="set-btn">この回答をベストアンサーに設定</button>
                        </form>
                      </div>
                    @endif

                    @if(Auth::id() === $answer->user->id && $question->best_answer !== $answer->id)
                      <div class="answer-delete">
                        <form method="GET" action="{{ action('AnswersController@delete') }}">
                          @csrf
                          <input name="id" type="hidden" value="{{ $answer->id }}">
                          <button class="answer-delete-btn">回答を削除する</button>
                        </form>
                      </div>
                    @endif
                      
                  </div>
                @endforeach
                @if($answers === null)
                  <p>現在この質問に対する回答はありません</p>
                @endif
                

              </div>

            </div>
            
          </div>
          
  
        </div>
  


@endsection

