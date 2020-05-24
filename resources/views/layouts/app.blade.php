<!DOCTYPE html>
<html lang="ja">

    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    
     @yield('page_css')
    
        <!--<script type="text/javascript" src="js/jQuery-3.3.1.min.js"></script>-->
        <!--<script type="text/javascript" src="js/front.js"></script>-->

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/css/drawer.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/js/drawer.min.js"></script>
            <!-- Styles -->
        <link href="{{ secure_asset('css/front.css') }}" rel="stylesheet">


        
    </head>


    <body class="drawer drawer--left">
    <div id="app">
        <header role="banner">
            <div class="haeder-navigation">

                <button type="button" class="drawer-toggle drawer-hamburger">
                    <span class="sr-only">toggle navigation</span>
                    <span class="drawer-hamburger-icon"></span>
                </button>
                <nav class="drawer-nav" role="navigation">
                    <ul class="drawer-menu">
                        @guest
                            <li><p class="drawer-brand">Menu</p></li>
                            <li><a class="drawer-menu-item" href="{{ route('register') }}">新規会員登録</a></li>
                            <li><a class="drawer-menu-item" href="{{ route('login') }}">ログイン</a></li>
                            <li><a class="drawer-menu-item" href="{{ route('contact') }}">お問い合わせ</a></li>
                        @else
                            <li><p class="drawer-brand">Menu</p></li>
                            <li><a class="drawer-menu-item" href="{{ route('my_profile') }}">マイページ</a></li>
                            <li><a class="drawer-menu-item" href="{{ route('question_create') }}">質問を投稿</a></li>
                            <li><a class="drawer-menu-item" href="{{ route('contact') }}">お問い合わせ</a></li>
                            <li><a class="drower-meni-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>

                        @endguest
                    </ul>

                </nav>

                <div class="header-logo header-contents">
                    <a href="{{ route('home') }}">
                        <img class="site-logo" src="{{ secure_asset('image/IMG_3366.jpeg') }}" alt="">
                    </a>
                </div>
                <div class="search-box header-contents">
                    <form action="{{ action('QuestionController@index') }}" method="get">
                        @csrf
                        <label for="head-category">
                            <select class="head-category" for="head-category" name="category" size="1" >
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
                        <input type="text" class="header-box" name="cond_title" placeholder="キーワードを入力"  style="width:300px;height:25px;">
                        <button class="header-btn" style="width:50px;height:29px;">検索</button>
                    </form>
                </div>
                
                
                <!-- Right Side Of Navbar -->
                <div class="header-contents header-guest">
                    @guest
                        <a href="{{ route('login') }}">ログイン</a>
                        <a href="{{ route('register') }}">新規会員登録</a>
                    @else
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <!--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">-->
                        <!--    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">-->
                        <!--                {{ __('Logout') }}-->
                        <!--    </a>-->
                        <!--    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">-->
                        <!--    @csrf-->
                        <!--    </form>-->
                        <!--</div>-->
                    @endguest
                </div>
            </div>
        </header>

        <div class="main">
            @yield('content')
        </div> 

        <footer>
            <p class="copyright">my portfolio.</p>
        </footer>
        </div>
    </body>
</html>
<script>
  /*global Vue*/
  document.addEventListener('DOMContentLoaded', function() {
    window.app = new Vue();
  });
  /*global jQuery*/
  jQuery(function($){
    $(document).ready(function() {
      $(".drawer").drawer();
    });
  });
</script>
