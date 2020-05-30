@extends('layouts.app')

@section('title')
ログインフォーム
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" type="text/css" />
@endsection

@section('content')
    <div class="container">
  
        <div class="signup">

          <div class="title">
            <h1>会員ログイン</h1>
          </div>
          <form method="POST" action="{{ action('Auth\LoginController@login') }}">
            @csrf
            
            <div class="mailaddres">
              <h3>メールアドレス</h3>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                  <p class="invalid-feedback" role="alert">
                    {{ $message }}
                  </p>
                @enderror
            </div>

  
            <div class="password">
              <h3>パスワード</h3>

              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                  <p class="invalid-feedback" role="alert">
                    {{ $message }}
                  </p>
                @enderror
            </div>

            <div class="form-group row">
              <div class="col-md-6 offset-md-4">
                  <div class="checkbox">
                      <label>
                          <input class="check" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> ログイン状態を保持する
                      </label>
                    </div>
                </div>
            </div>
          
  
            <button class="login-btn">ログイン</button>
  
          </form>
        </div>
    </div>
    
@endsection
