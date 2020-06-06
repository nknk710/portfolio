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
                  @if ($question->user->profile_image != null)
                    <img class="profile_img" src="{{ $question->user->profile_image }}">
                  @else
                    <img class="profile_img" src="{{ secure_asset('image/ja_2016_01.webp') }}" name="profile_image" alt="">
                  @endif
                  
                    <a href="{{ action('UsersController@index', ['id' => $question->user_id]) }}">{{ $question->user->user_name }}</a>
                    

                </div>  
                <div class="qustion-body">
                  <p>{{ $question->body }}</p>
  
                  <div class="post-day">
                      @if ( $question->best_answer == null )
                        <span class="unsolved">回答受付中</span>
                      @else
                        <span class="solution">解決済み</span>
                      @endif
                    
                    <span class="question-category">{{ $question->category }}</span><br>
                    <span class="created_at">投稿日時</span>
                    <p class="created_at">{{ $question->created_at->format('Y/m/d H:i') }}</p>
                  </div>
                </div>
  
              </div>
              
              
              @if(Auth::id() == $question->user_id || $admin)
                @if($question->best_answer == null)
                  <form method="POST" action="{{ action('QuestionController@edit') }}">
                    @csrf
                    <input name="id" type="hidden" value="{{ $question->id }}">
                    <button class="bookmark-btn">質問を編集する</button>
                  </form>
                @endif
                <form method="GET" action="{{ action('QuestionController@delete') }}">
                  @csrf
                  <input name="id" type="hidden" value="{{ $question->id }}">
                  <button class="delete-btn">質問を削除する</button>
                </form>
              @endif
              @if(Auth::id() != $question->user_id)
                @guest
                @else
                  @if($bookmark == null)
                    <form method="POST" action="{{ action('BookmarkController@add') }}">
                      @csrf
                      <input name="id" type="hidden" value="{{ $question->id }}">
                      <button class="bookmark">この質問をブックマークに追加</button>
                    </form>
                  @endif
                @endguest
              @endif
              
              @if($question->best_answer == null)
                @if(Auth::id() != $question->user_id)
                  <div class="answer-post">
                    <h3>回答投稿</h3>
                    @guest
                      <p class="guest-message">会員登録すると回答投稿機能がご利用できます</p>
                    @else
                      <form action="{{ action('AnswersController@create') }}" method="POST">
                        @csrf
                        <textarea name="answer" id="" cols="30" rows="10"></textarea>
                        <input name="id" type="hidden" value="{{ $question->id }}">
                        <button class="post-btn">回答を投稿する</button>
                      </form>
                    @endguest
                  </div>
                @endif
              @endif

              <div class="answer-list">
                <div class="answer-head">
                 <h3>回 答 一 覧</h3> 
                </div>
                
                @foreach($answers as $answer)
                  @if($answer->id == $question->best_answer)
                  <div class="answer">

                    <div class="answer-content">
                      @if($question->best_answer == $answer->id)
                        <span class="best-answer">ベストアンサー</span>
                      @endif
                       <p>{{ $answer->answer }}</p>
                    </div>
                    <div class="answer-user user">
                      @if ($answer->user->profile_image != null)
                        <img class="profile_img" src="{{ $answer->user->profile_image }}">
                      @else
                        <img class="profile_img" src="{{ secure_asset('image/ja_2016_01.webp') }}" name="profile_image" alt="">
                      @endif
                      <a href="{{ action('UsersController@index', ['id' => $answer->user_id]) }}">{{ $answer->user->user_name }}</a>
                    </div>
                    <div class="date">
                      <span class="created_at">投稿日時</span>
                      <p class="created_at">{{ $answer->created_at->format('Y/m/d H:i') }}</p>
                    </div>

                  </div>
                  @endif
                @endforeach
                
                @foreach($answers as $answer)
                  @if($answer->id != $question->best_answer)
                  <div class="answer">

                    <div class="answer-content">
                      @if($question->best_answer == $answer->id)
                        <span class="best-answer">ベストアンサー</span>
                      @endif
                       <p>{{ $answer->answer }}</p>
                    </div>
                    <div class="answer-user user">
                      @if ($answer->user->profile_image != null)
                        <img class="profile_img" src="{{ $answer->user->profile_image }}">
                      @else
                        <img class="profile_img" src="{{ secure_asset('image/ja_2016_01.webp') }}" name="profile_image" alt="">
                      @endif
                      <a href="{{ action('UsersController@index', ['id' => $answer->user_id]) }}">{{ $answer->user->user_name }}</a>
                    </div>
                    <div class="date">
                      <span class="created_at">投稿日時</span>
                      <p class="created_at">{{ $answer->created_at->format('Y/m/d H:i') }}</p>
                    </div>

                    @if($question->best_answer == null && Auth::id() == $question->user_id)
                      <div class="best-answer-set">
                        <form method="GET" action="{{ action('AnswersController@add') }}">
                          @csrf
                          <input name="id" type="hidden" value="{{ $answer->id }}">
                          <button class="set-btn">この回答をベストアンサーに設定</button>
                        </form>
                      </div>
                    @endif

                    @if(Auth::id() == $answer->user->id && $question->best_answer != $answer->id)
                      <div class="answer-delete">
                        <form method="GET" action="{{ action('AnswersController@delete') }}">
                          @csrf
                          <input name="id" type="hidden" value="{{ $answer->id }}">
                          <button class="answer-delete-btn">回答を削除する</button>
                        </form>
                      </div>
                    @endif
                      
                  </div>
                  @endif
                @endforeach
                
                @if(count($answers) <= 0)
                  <p>現在この質問に対する回答はありません</p>
                @endif
                

              </div>

            </div>
            
          </div>
          
  
        </div>
  


@endsection

