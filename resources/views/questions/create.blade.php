@extends('layouts.app')

@section('title')
新規質問投稿
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ secure_asset('css/question_create.css') }}" type="text/css" />
@endsection


@section('content')
        <div class="container">


          <div class="question-content">
            <form method="POST" action="{{ action('QuestionController@create') }}">
              @csrf

              <div class="category">
                <p>カテゴリ</p>
                <label for="category">
                  <select for="category" name="category" id="" size="1" >
                      <option value="Java">Java</option>
                      <option value="C">C</option>
                      <option value=C++"">C++</option>
                      <option value="C#">C#</option>
                      <option value="Python">Python</option>
                      <option value="JavaScript">JavaScript</option>
                      <option value="PHP">PHP</option>
                      <option value="Ruby">Ruby</option>
                      <option value="HTML,CSS">HTML,CSS</option>
                      <option value="Swift">Swift</option>
                      <option value="その他">その他</option>
                  </select>
              </label>

              </div>

              <div class="question-title">
                <p>タイトル</p>
                <input class="title" type="text" name="title" value="">
              </div>
  
              <div class="question">
                <p>質問内容</p>
                <textarea name="body" id="" cols="30" rows="10" placeholder="(例)○○を実装するために下記のようなコードを書いて実行したのですが上手くいきません。"></textarea>
              </div>
              <button class="post-btn">質問を投稿する</button>
              <!-- <button>質問内容を更新する</button> -->

            </form>


          </div>

          
        </div>
@endsection
