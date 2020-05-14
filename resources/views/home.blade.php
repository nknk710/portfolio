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
                    <form action="" method="post">
                        <label for="category">
                            <select class="category" for="category" name="" id="" size="1" >
                                <option>Java</option>
                                <option>C</option>
                                <option>C++</option>
                                <option>C#</option>
                                <option>Python</option>
                                <option>JavaScript</option>
                                <option>PHP</option>
                                <option>Ruby</option>
                                <option>HTML,CSS</option>
                                <option>Swift</option>
                                <option>その他</option>
                            </select>
                        </label>
                        <input type="text" class="box" placeholder="キーワードを入力" style="width:300px;height:25px;">
                        <button style="width:50px;height:30px;border-radius:2px;">検索</button>
                    </form>
            
                </div>
            </div>

            <div class="main-contents-left">
                <h1 class="">新しく投稿された質問</h2>
            </div>

            <div class="main-contents-left">
                <h1 class="">フォロワーの質問</h1>
            </div>

            <div class="main-contents-left">
                <h1 class="">空き</h1>
            </div>

        </div>
        <div class="right-contents">
            <div class="main-contents-right ad">
                <h1 class="">広告</h2>
            </div>
            <div class="main-contents-right vip-question">
                <h1 class="text-title">困っています</h1>
            </div>
            <div class="main-contents-right">
                <h1 class="text-title">空き</h1>
            </div>
        </div>
    </div>
</div> 


@endsection
