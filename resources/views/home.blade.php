@extends('layouts.app')

@section('title')
Qyou(エンジニアのためのQ＆Aサイト)
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ secure_asset('css/home.css') }}" type="text/css" />
@endsection


@section('content')

    <div class="container">
        
        <div class="left-contents">
            <div class="main-contents-left">
                <div class="question-contents">
                    <h1>質問してみよう</h1>
                    <p>分からないことはまずは自らで調べてその結果を試してみましょう。<br>それでも分からなかったり、内容がきちんと理解できない場合などは積極的に質問してみましょう。</p>
                
                    @guest
                        <button class="signup-btn" onclick="location.href='/register'">会員登録をして質問をする</button>
                    @else
                        <button class="question-btn" onclick="location.href='questions/create'">質問をする</button>
                    @endguest
                </div>
            </div> 

            <div class="main-contents-left">
                <div class="serch-box">
                    <h1>質問を検索</h1>
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
                        <input type="text" class="box" name="cond_title" placeholder="キーワードを入力"  style="width:270px;height:25px;">
                        <button class="search-btn" style="width:50px;height:30px;border-radius:2px;">検索</button>
                    </form>

                </div>
            </div>

            <div class="main-contents-left">
                <h1 class="">新しく投稿された質問</h1>
                @foreach($questions as $question)
                    <div class="new-question">
                      <div class="type">
                        @if ( $question->best_answer === null )
                          <span class="unsolved">回答受付中</span>
                        @else
                          <span class="solution">解決済み</span>
                        @endif
                        <span class="question-category">{{ $question->category }}</span>
                      </div>
                      <div class="question-title">
                          <a href="{{ action('QuestionController@show', ['id' => $question->id]) }}">{{ $question->title }}</a>
                      </div>        
                    </div>
                @endforeach
                <div class="more">
                    <a href="{{ action('QuestionController@new_question') }}">もっと見る</a>
                </div>
                
            </div>
            
    </div>
</div> 


@endsection
