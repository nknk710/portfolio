@extends('layouts.app')

@section('title')
{{ここに質問タイトルを入れる}}
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ secure_asset('css/question.css') }}" type="text/css" />
@endsection


@section('content')

        <div class="container">
          <div class="question-content">
            <div class="top-contents">
              <div class="question-head">
               <h1>タイトル</h1>
              </div>
            </div>



            <div class="main-content">

              <div class="question">
                <div class="quesrion-user user">
                  <img class="profile_img" src="{{ secure_asset('image/ja_2016_01.webp') }}" alt="">
                  <a href="#">タケシ</a>
                </div>  
                <div class="qustion-body">
                  <p>教えてください教えてください教えてください教えてください教えてください教えてください教えてください教えてください教えてください教えてください教えてください教えてください教えてください教えてください</p>
  
                  <div class="post-day">
                    <span class="solution">解決済み</span>
                    <span class="question-category">php</span>
                    <p>2020/01/01 0:00</p>
                  </div>
                </div>
  
              </div>
              <!-- <button class="bookmark">この質問をブックマークに追加</button>
                <button class="bookmark">この質問をブックマークから削除</button> -->
                <button class="bookmark">質問を編集する</button>
                <button class="delete">質問を削除する</button>
              
              <div class="answer-post">
                <h3>回答投稿</h3>
                <form action="#" method="POST">
                    @csrf
                  <textarea name="" id="" cols="30" rows="10"></textarea>
                  <button class="post">回答を投稿する</button>
                </form>
              </div>

              <div class="answer-list">
                <div class="answer-head">
                 <h3>回 答 一 覧</h3> 
                </div>

                <div class="answer">
                  
                  <div class="answer-content">
                    <span class="best-answer">ベストアンサー</span>
                     <p>これを試してみてくださいこれを試してみてくださいこれを試してみてくださいこれを試してみてくださいこれを試してみてください</p>
                  </div>
                  <div class="answer-user user">
                    <img class="profile_img" src="{{ secure_asset('image/ja_2016_01.webp') }}" alt="">
                    <a href="#">タケシ</a>
                  </div>
                  <div class="best-answer-set">
                    <button class="set-btn">この回答をベストアンサーに設定</button>
                  </div>
                </div>

                <div class="answer">
                  
                  <div class="answer-content">
                     <p>これを試してみてくださいこれを試してみてくださいこれを試してみてくださいこれを試してみてくださいこれを試してみてください</p>
                  </div>
                  <div class="answer-user user">
                    <img class="profile_img" src="{{ secure_asset('image/ja_2016_01.webp') }}" alt="">
                    <a href="#">タケシ</a>
                  </div>
                  <div class="best-answer-set">
                    <button class="set-btn">この回答をベストアンサーに設定</button>
                  </div>
                </div>

              </div>

            </div>
          </div>
  
        </div>
  


@endsection
